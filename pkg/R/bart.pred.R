#' Function for prepares HTSxt, Alpha and MPA spectral data table to be used by the prediction engine located at: http://afsistest.ciesin.columbia.edu/bart_prediction
#'
#' @author Andrew Sila \email{asila@cgiar.org}
#' Note: The spectral file to be predicted should be a CSV or ASCII format with the following details
#-------First row is the columns (header) e.g.
#-------First column is SSN info
#-------Second column is the sampling depth for soil samples.
#-------Columns 3:1752 are spectrum measurements from "m4003.5" to "m601.7" for MIR spectra from HTSxt spectrometer
#-------Columna 3:1752 are spectrum measurements from "n8003.6" to "n3999.9" for NIR spectra from MPA spectrometer 
# Alpha predictions requires fine tuning!

#Read in raw data from HTSxt:
bart.pred<-function(file.name,instr.data=c("HTSxt","MPA","Alpha"),depth){
	ir <- read.csv(file.name)
	#Get columns with numeric part
	ir.header<-as.numeric(gsub("[^0-9.]", "", colnames(ir)))

	#Get co2 regions in HTSxt
	if (instr.data=="HTSxt"){

	co2<-which(ir.header>2351 & ir.header<2381)
		if(length(co2)>0){
			ir.header<-ir.header[-co2]
				}
		}
	#Get the columns with spectra
	bands<-which(!is.na(ir.header))
	spectra<-as.matrix(ir[,bands])
	colnames(spectra)<-ir.header[bands]
	#Transform it using first derivative
		#Check if the entire IR range is included in the file
			#if(length(bands)>2000){
				#der<-trans(spectra[,-c(1,ncol(spectra))])$trans
					#}
			#if(length(bands)<1800){
				#der<-trans(spectra)$trans
					#}
#No transformation required,BART gets first derivatives on the fly
#Take from the first derivative transformed matrix ranges to be used by BART prediction
			if(instr.data=="HTSxt"){
				p.bands<-paste0("m",round(as.numeric(colnames(spectra)),1))
					a<-which(p.bands=="m601.7")
					b<-which(p.bands=="m4003.5")
						}

			if(instr.data=="MPA"){
				p.bands<-paste0("n",round(as.numeric(colnames(spectra)),1))
					a<-which(p.bands=="n3999.8")
					b<-which(p.bands=="n8003.5")
						}
			if(instr.data=="Alpha"){
				p.bands<-paste0("a",round(as.numeric(colnames(spectra)),1))
					a<-which(p.bands=="a3998.1")
					b<-which(p.bands=="a400.8")
						}
					#Get corresponding ir region from derivative matrix	
			pred.data<-spectra[,a:b]
			colnames(pred.data)<-p.bands[a:b]
		
			#Add SSN and depth
		depth<-rep(depth,nrow(pred.data))
	ir.p<-cbind(as.vector(ir[,1]),depth,pred.data)
	colnames(ir.p)<-c("SSN","depth",colnames(pred.data))
	return(as.data.frame(ir.p))
#Save for use with BART 
write.table(ir.p,file=paste(getwd(),paste(instr.data," bart prediction format.csv",sep=""),sep="/"),sep=",",row.names=FALSE)
}

