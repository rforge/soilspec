#Wavelength/Wavenunber converter
#This converter is used to convert wavelength (nm) to wavenumbers (cm-1) and vice-versa
#' @author Andrew Sila \email{asila@cgiar.org} and Tomislav Hengl \email{tom.hengl@wur.nl}

#wwconvert<-function(toconvert,outmode=1){
#	if(!is.numeric(toconvert)){
#		message("Remove any non-numeric characters from the values being converted")
#			#print("--------0--------0--------0-------0")
#						print("...........................................")
#
#				stop("Wavenumber<->Walength conversion requires numeric values only" )
#
#	}
#	units<-c("wavelength (nm)","wavenumbers (cm-1)")
#	unit<-menu(c("wavelength (nm)","wavenumbers (cm-1)"),graphics=TRUE,title="Units to convert from")
#	 out<-round(1e7/toconvert,3)
#	 	#outmode can only be eithe mode 1 or 2 only!
#	 	if(any(!outmode %in% 1:2)){
#	 		stop("outmode can either be in 1 or 2 mode only")
#	 								}
#	 	if(outmode==1){
#		print(out)
#		message(units[unit], " converted to ", units[-unit],":")
#	 			}
#	 	if(outmode==2){
#	 	output<-list(converted = out,conversion = paste0(units[unit], " converted to ", units[-unit]))
#	 	return(output)
#	 				}
#	}


## TH: maybe something like this be more useful:
wl2wn <- function(x, signif.digit=get("signif.digit", spec.opts)){
   x <- as.numeric(x)
   x <- ifelse(x<0, NA, x)
   out <- signif(1e7/x, signif.digit)
   attr(out, "units") <- "wavenumbers (1/cm)"
   return(out)
}

wn2wl <- function(x, signif.digit=get("signif.digit", spec.opts)){
   x <- as.numeric(x)
   x <- ifelse(x<0, NA, x)
   out <- signif(x*1e7, signif.digit)
   attr(out, "units") <- "wavelength (nm)"
   return(out)
}