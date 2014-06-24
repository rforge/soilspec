
<!-- This is the project specific website template -->
<!-- It can be changed as liked or replaced by other content -->

<?php

$domain=ereg_replace('[^\.]*\.(.*)$','\1',$_SERVER['HTTP_HOST']);
$group_name=ereg_replace('([^\.]*)\..*$','\1',$_SERVER['HTTP_HOST']);
$themeroot='r-forge.r-project.org/themes/rforge/';

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en   ">

  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $group_name; ?></title>
	<link href="http://<?php echo $themeroot; ?>styles/estilo1.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
<!--
.style2 {font-size: x-small}
.style3 {font-size: small}
-->
    </style>
</head>

<body>

<!-- R-Forge Logo -->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr><td>
<a href="http://r-forge.r-project.org/"><img src="http://<?php echo $themeroot; ?>/imagesrf/logo.png" border="0" alt="R-Forge Logo" /> </a> </td> </tr>
</table>


<!-- get project title  -->
<!-- own website starts here, the following may be changed as you like -->

<?php if ($handle=fopen('http://'.$domain.'/export/projtitl.php?group_name='.$group_name,'r')){
$contents = '';
while (!feof($handle)) {
	$contents .= fread($handle, 8192);
}
fclose($handle);
echo $contents; } ?>

<!-- end of project description -->

<p> No content added. </p>

<p> The <strong>project summary page</strong> you can find <a href="http://<?php echo $domain; ?>/projects/<?php echo $group_name; ?>/"><strong>here</strong></a>. Description of the functions and data sets is available from the <a href="00Index.html"><strong>package documentation</strong></a>. </p>
<hr />
<p><strong>soil.spec package</strong>: Soil spectroscopy tools and reference models</p>
<h2>Maintainers:</h2>
<div dir="ltr">
  <table cellpadding="5" cellspacing="5">
    <colgroup>
      <col width="132" />
      <col width="288" />
    </colgroup>
    <tr>
      <td><p align="center" dir="ltr"><strong><img src="andrew.sila.jpg" alt="andrew.sila" width="120" height="167"/></strong></p>
          <p align="center" class="style2" dir="ltr"><strong>A. (Andrew) Sila</strong></p></td>
      <td width="450"><p dir="ltr"><a href="http://www.worldagroforestry.org/about_us/organisation_and_people/senior_leadership/Shepherd" target="_blank">World Agroforestry Centre</a> (ICRAF)<br />
        Data Analyst</p>
          <p dir="ltr">Contact: A.SILA@CGIAR.ORG</p></td>
    </tr>
    <tr>
      <td><p align="center" dir="ltr"><strong><img src="tom.hengl.jpg" width="120" height="173" alt="tom.hengl"/></strong></p>
          <p align="center" class="style2" dir="ltr"><strong>T. (Tom) Hengl</strong></p></td>
      <td width="450"><p dir="ltr"><a href="http://www.isric.org" target="_blank">ISRIC &mdash; World Soil Information</a><br />
        Senior researcher</p>
        <p dir="ltr">Contact: TOM.HENGL@WUR.NL </p></td>
    </tr>
  </table>
</div>
</p>
<hr />
<p align="left" dir="ltr"><strong><img src="soil.spec_workflow.png" alt="alphaMIR_corrplots" width="950"/><br />
  </strong><span class="style2">Fig: General processing workflow in soil.spec package.</span></p>
<hr />
<h2>Overview:</h2>
<p dir="ltr">Among other things, the package provides: </p>
<ul>
  <li dir="ltr">
    <p dir="ltr">Classes and methods for Spectra data (<a href="SpectraPoints.html">Spectra</a>, <a href="SpectraPoints.html">SpectraPoints</a>, and <a href="fit.SpectraModel.html">SpectraModel</a>);</p>
  </li>
  <li dir="ltr">
    <p dir="ltr">Generic <a href="fit.SpectraModel.html">fit.SpectraModel</a> and <a href="predict.SpectraPoints.html">predict.SpectraPoints</a> methods based on the <a href="http://cran.r-project.org/web/packages/pls/">PLS</a> models;</p>
  </li>
  <li dir="ltr">
    <p dir="ltr"><a href="predict.SpectraPoints.html">Reference models to predict soil properties</a> (organic carbon, soil pH, Al, ExCa, ExK, ExMg, ExNa, Exbases, N, Sand) from spectral absorbance data (MIR, alpha-MIR and VISNIR);</p>
  </li>
  <li dir="ltr">
    <p dir="ltr">Auxiliary functions to <a href="plot.Spectra.html">visualize Spectra objects</a> and detect outliers;</p>
  </li>
</ul>
<hr />
<h2>Installation / first steps:</h2>
<p dir="ltr">To install from source please use:</p>
<pre><em>&gt; install.packages(c(&quot;pls&quot;, &quot;KernSmooth&quot;, &quot;wavelets&quot;, &quot;hexView&quot;, &quot;sp&quot;, &quot;GSIF&quot;, &nbsp;&quot;e1071&quot;, &quot;class&quot;, &quot;chemometrics&quot;, &quot;plyr&quot;, &quot;plotKML&quot;, &quot;mgcv&quot;, &quot;nlme&quot;, &quot;spatstat&quot;, &quot;scales&quot;, &quot;date&quot;, &quot;lava&quot;))</em><br /><em>&gt; install.packages(&quot;soil.spec&quot;, repos=c(&quot;http://R-Forge.R-project.org&quot;), type = &quot;source&quot;)</em></pre>
<p>Typical workflow in the soil.spec package is:</p>
<pre><em>&gt; #1. Import binary file containing absorbances (OPUS):</em><br /><em>&gt; xx &lt;- read.opus(&quot;icr_087266_B2.0&quot;)</em><br />Creating object of type &quot;SpectraPoints&quot;...<br /><em>&gt; #2. Load the reference model:</em><br /><em>&gt; data(m.PHIHOX)</em><br /><em>&gt; #3. Predict soil pH based on the reference model:</em><br /><em>&gt; s.xx &lt;- predict(xx, model = m.PHIHOX, prob. = .75)</em><br /><em>&gt; s.xx</em><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHIHOX PHIHOX_lower PHIHOX_upper<br />icr087266 &nbsp;&nbsp;&nbsp;9.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.58 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9.62</pre>
<hr />
<h2>OPUS spectral data format</h2>
<p dir="ltr">This package has been build to <a href="read.opus.html">read OPUS files</a> from the three Bruker spectrometers into R to be used in chemometric methods e.g. developing calibration models, for prediction, clustering, etc. Co2 bands (2380-2351 cm-1) within the MIR data are removed at the time of conversion from the original OPUS format, to ensure consistent spectra obtain from different parts of the world with varying CO2 concentration in the atmosphere.</p>
<p dir="ltr">OPUS (OPtical User Software) is the Bruker data collection and analysis program for Alpha, Multi-Purpose Analyzer (MPA) and Tensor 27 FT-IR (HTS-xt) spectrometers. Spectral data files stored in this format are characterized by a numeric extension, usually a zero unless there are duplicates which are given increamented by one. There are lots of spectral details &nbsp;stored in form of data-blocks &nbsp;inside these files ranging from date and time of measurement, type of instrument used, Absorbance values, IR regions and much, please visit this <a href="http://shaker.umh.es/investigacion/OPUS_script/OPUS_5_BasePackage.pdf">link </a>for details.</p>
<hr />
<h2>Reference models</h2>
<p dir="ltr"><strong>soil.spec</strong> package provides reference models to predict a list of targeted soil properties (<a href="spec.env.html">organic carbon, soil pH, Al, ExCa, ExK, ExMg, ExNa, Exbases, N, Sand</a>) directly from absorbances, i.e. without a need to fit your own calibration data. How were these models fitted? We used the calibration data (1391 samples) from the Africa Soil Information Services (AfSIS) project to fit <a href="http://gsif.r-forge.r-project.org/afss.html">pan-African soil spectroscopy calibration models</a>. To learn more about the AfSIS project, please visit this <a href="http://www.africasoils.net/">link</a>.</p>
Correlation plots:<br />
<ol>
  <li><strong dir="ltr">MIR </strong>(<a href="Fig_10_vars_fits_HST_MIR.png">plot</a>)</li>
  <li><strong>alpha-MIR</strong> (<a href="Fig_10_vars_fits_Alpha_MIR.png">plot</a>)</li>
  <li><strong>VISNIR* </strong>(<a href="Fig_10_vars_fits_MPA_NIR.png">plot</a>)</li>
</ol>
<p class="style2">*Note: ExNa is difficult to predict and is good to show this from the models. Al prediction are poor for low values &lt;150 mg/kg as can be seen from the HTS-xt MIR models, though MPA model is not as good as the other two.</p>
<hr />
<table width="100%" border="0">
  <tr>
    <td><span class="style3">Last update: 
      <!-- #BeginDate format:Am1 -->June 24, 2014<!-- #EndDate -->
    </span></td>
    <td><span class="style3"></span></td>
    <td><div align="right" class="style3"><a href="http://www.worldagroforestry.org/about_us/organisation_and_people/senior_leadership/Shepherd">World Agroforestry Centre</a> (ICRAF)</div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
