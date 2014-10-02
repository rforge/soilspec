\name{wl2wn}
\alias{wl2wn}
\alias{wn2wl}
\title{ Converts wavenumbers to wavelengths and vice versa}
\description{Converts wavelengths (nm) to wavenumbers (\eqn{cm^{-1}}) and vice versa.}
\usage{
wl2wn(x, signif.digit=get("signif.digit", spec.opts))
wn2wl(x, signif.digit=get("signif.digit", spec.opts))
}
\arguments{
  \item{x}{numeric; either wavenumbers or wavelengths to be converted}
  \item{signif.digit}{integer; significant digits}
}
\details{Wavenumber is defined as the number of wavelengths per unit distance (\eqn{\frac{1}{\lambda}}),where \eqn{\lambda} is the wavelength. For electromagnetic radiation, wavenumber is proportional to frequency and to photon energy. Therefore, wavenumbers are used as a unit of energy in spectroscopy and in the SI  system of units expressed in units of reciprocal meters (\eqn{m^-1}), but in spectroscopy it is standard practise to give wavenumbers in reciprocal centimeters (\eqn{cm^-1}) or Kaisers. Kaiser (K) is a unit of energy. A common form is kiloKaiser (kK): \eqn{ 1kK = 1000 cm ^-1}. This unit is most commonly used with respect to energy transitions between electronic states in inorganic complexes.
The unit is names after Heinrich Gustav Johannes Kayser (16 March 1853 - 14 October 1940), a German physicist. While on the other hand, since wavelengths are usually very small one often uses nano meter (nm) which is \eqn{10^-1} m. During conversion process specify in the dialogue menu whether you are converting from wavenumbers to wavelengths or vice versa
}
\references{
	 \itemize{
	\item French, A P. (1971) Vibrations and Waves. New York: W. W. Norton.
	\item Fuguet, Elisabet; Carla Rafols; et al. (2003) Langmuir Vol. 19, No. 1.
}	
}
\author{Andrew Sila}