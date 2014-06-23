\name{bart.pred}
\alias{bart.pred}
%- Also NEED an '\alias' for EACH other topic documented here.
\title{Prepares HTSxt, Alpha and MPA spectral data tables to be used by the prediction engine}
\description{ This function prepares HTSxt, Alpha and MPA soil spectral data table to be used by the prediction engine located at:
						Prediction engine url: http://afsistest.ciesin.columbia.edu/bart_prediction
						The spectral file to be predicted should be a CSV or ASCII format with the following details
}
\usage{
bart.pred(file.name,instr.data=c("HTSxt","MPA","Alpha"),depth)
}
%- maybe also 'usage' for other objects documented here.
\arguments{
  \item{file.name}{
file.name refers to the file with spectra to be put in the format required by the prediction engine. If the current working directory is not the same as the where the spectral file is stored, then the file.name should included the full path. }
  \item{instr.data}{BART prediction engine contain models for three Bruker spectrometers: 1). Tensor-27 (HTSxt) for MIR; 2). Alpha for MIR ; and 3). NIR Multi-purpose Analyzer (MPA). The function requires the spectra file to be identified with its instrument source.}
  \item{depth}{This is the actual soil sampling depth in meters, see details for further explaination.}
  }
\details{Spectral data acquired from spectromters contains some non-informative bands which should be dropped prior to prediction. The particular informative bands used to develop BART prediction models are: 
\itemize{
\item HTSxt: m4003.5 - m601.7 wavenumbers (\eqn{cm^{-1}}); 
\item Alpha: a3998.1 - a400.8 wavenumbers (\eqn{cm^{-1}}) and;
\item MPA n8003.5 - n399.8 wavenumbers (\eqn{cm^{-1}}) 
	}

Soil sampling depth is expressed in form of meters from the sampling details obtained in the field. This function takes one sampling depth at atime, 
therefore users are advised to put together spectra from one sampling depth to be predict in one batch and prepare another batch from a different sampling depth. 
Another approach will be included in the package's vignette	}		
\value{
A data frame with spectra organized in rows with first column holding spectral ids (SSN), second column holding sampling depth (m) which is  repeated in all the spectra and the rest of the columns are the required 
spectral points corresponding to the type of instrumnet data being prepared.}

\references{
	 \itemize{
	\url{http://afsistest.ciesin.columbia.edu/bart_prediction/}}
		
}
\author{Andrew Sila and Tomislav Hengl}
\note{
Matching regions are obtained if during the OPUS file conversion the option for using ICRAF setting is selected.
}


\seealso{ \code{\link{read.opus}}}

\examples{
## Read a file with spectra to be formatted with uniform sample depth from Alpha spectrometer
#file.name<-"d:/raw spectra.csv"

##  What is the sampling depth?
## If soil samples were taken from the surface at 0 - 20 cm
depth <-0.2 

##Run bart.pred
#pred<-bart.pred(file.name,"Alpha",0.2)

#Save formatted spectra file to be used for prediction process
#write.table(pred, file="d:/predictions",sep=",",row.names=FALSE)
}
\keyword{depth}
\keyword{file.names}