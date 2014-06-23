
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

<p> The <strong>project summary page</strong> you can find <a href="http://<?php echo $domain; ?>/projects/<?php echo $group_name; ?>/"><strong>here</strong></a>. </p>
<hr />
<p><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">soil.spec package</strong>: <strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">Soil spectroscopy tools and reference models</strong></p>
<h2 dir="ltr"><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">Maintainers:</strong></h2>
<br />
<div dir="ltr">
  <table cellpadding="5" cellspacing="5">
    <colgroup>
      <col width="132" />
      <col width="288" />
    </colgroup>
    <tr>
      <td><p align="center" dir="ltr"><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3"><img src="andrew.sila.jpg" alt="andrew.sila" width="120" height="167"/></strong></p>
          <p class="style2" dir="ltr"><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">A. (Andrew) Sila</strong></p></td>
      <td width="450"><p dir="ltr"><a href="http://www.worldagroforestry.org/about_us/organisation_and_people/senior_leadership/Shepherd">World Agroforestry Centre</a> (ICRAF)<br />
        Data Analyst</p>
          <p dir="ltr">Contact: A.SILA@CGIAR.ORG</p></td>
    </tr>
    <tr>
      <td><p align="center" dir="ltr"><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3"><img src="tom.hengl.jpg" width="120" height="173" alt="tom.hengl"/></strong></p>
          <p class="style2" dir="ltr"><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">T. (Tom) Hengl</strong></p></td>
      <td width="450"><p dir="ltr">ISRIC &mdash; World Soil Information<br />
        Senior researcher</p>
        <p dir="ltr">Contact: TOM.HENGL@WUR.NL </p></td>
    </tr>
  </table>
</div>
<hr />
</p>
<p align="left" dir="ltr"><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3"><img src="soil.spec_workflow.png" alt="alphaMIR_corrplots" width="950"/><br />
  </strong><span class="style2">Fig: General processing workflow in soil.spec package.</span></p>
<hr />
<h2><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">Overview:</strong></h2>
<p dir="ltr">Among other things, the package provides: </p>
<ul>
  <li dir="ltr">
    <p dir="ltr">Classes and methods for Spectra data (Spectra, SpectraPoints, and SpectraModel);</p>
  </li>
  <li dir="ltr">
    <p dir="ltr">Generic fit.SpectraModel and predict.SpectraPoints methods based on the <a href="http://cran.r-project.org/web/packages/pls/">PLS</a> models;</p>
  </li>
  <li dir="ltr">
    <p dir="ltr">Reference models to predict soil properties (organic carbon, soil pH, Al, ExCa, ExK, ExMg, ExNa, Exbases, N, Sand) from spectral absorbance data (MIR, alpha-MIR and VISNIR);</p>
  </li>
  <li dir="ltr">
    <p dir="ltr">Auxiliary functions to visualize Spectra objects and detect outliers;</p>
  </li>
</ul>
<hr />
<h2>Installation / first steps:</h2>
<p dir="ltr">To install from source please use:</p>
<pre><em>&gt; install.packages(c(&quot;pls&quot;, &quot;KernSmooth&quot;, &quot;wavelets&quot;, &quot;hexView&quot;, &quot;sp&quot;, &quot;GSIF&quot;, &nbsp;&quot;e1071&quot;, &quot;class&quot;, &quot;chemometrics&quot;, &quot;plyr&quot;, &quot;plotKML&quot;, &quot;mgcv&quot;, &quot;nlme&quot;, &quot;spatstat&quot;, &quot;scales&quot;, &quot;date&quot;, &quot;lava&quot;))</em><br /><em>&gt; install.packages(&quot;soil.spec&quot;, repos=c(&quot;http://R-Forge.R-project.org&quot;), type = &quot;source&quot;)</em></pre>
<p>Typical workflow in the soil.spec package is:</p>
<pre><em>&gt; #1. Import binary file containing absorbances (OPUS):</em></pre>
<pre><em>&gt; xx &lt;- read.opus(&quot;icr_087266_B2.0&quot;)</em></pre>
<pre>Creating object of type &quot;SpectraPoints&quot;...</pre>
<pre><em>&gt; #2. Load the reference model:</em></pre>
<pre><em>&gt; data(m.PHIHOX)</em></pre>
<pre><em>&gt; #3. Predict soil pH based on the reference model:</em></pre>
<pre><em>&gt; s.xx &lt;- predict(xx, model = m.PHIHOX, prob. = .75)</em></pre>
<pre><em>&gt; s.xx</em></pre>
<pre>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHIHOX PHIHOX_lower PHIHOX_upper</pre>
<pre>icr087266 &nbsp;&nbsp;&nbsp;9.1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.58 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9.62</pre>
<pre>&nbsp;
 </pre>
<h2 dir="ltr">OPUS spectral data format</h2>
<p dir="ltr">This package has been build to read OPUS files from the three Bruker spectrometers into R to be used in chemometric methods e.g. developing calibration models, for prediction, clustering, etc. Co2 bands (2380-2351 cm-1) within the MIR data are removed at the time of conversion from the original OPUS format, to ensure consistent spectra obtain from different parts of the world with varying CO2 concentration in the atmosphere.</p>
<p dir="ltr">OPUS (OPtical User Software) is the Bruker data collection and analysis program for Alpha, Multi-Purpose Analyzer (MPA) and Tensor 27 FT-IR (HTS-xt) spectrometers. Spectral data files stored in this format are characterized by a numeric extension, usually a zero unless there are duplicates which are given increamented by one. There are lots of spectral details &nbsp;stored in form of data-blocks &nbsp;inside these files ranging from date and time of measurement, type of instrument used, Absorbance values, IR regions and much, please visit this <a href="http://shaker.umh.es/investigacion/OPUS_script/OPUS_5_BasePackage.pdf">link </a>for details. </p>
<h2 dir="ltr"><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">Reference models</strong></h2>
<p dir="ltr"><strong>soil.spec</strong> package provides reference models to predict a list of targeted soil properties (organic carbon, soil pH, Al, ExCa, ExK, ExMg, ExNa, Exbases, N, Sand) directly from absorbances, i.e. without a need to fit your own calibration data. How were these models fitted? We used the calibration data (1391 samples) from the Africa Soil Information Services (AfSIS) project to fit pan-African soil spectroscopy calibration models. To learn more about the AfSIS project, please visit this <a href="http://www.africasoils.net/">link</a>.</p>
Correlation plots:<br />
<ol>
  <li><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3" dir="ltr">MIR </strong>(<a href="Fig_10_vars_fits_HST_MIR.png">plot</a>)</li>
  <li><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">alpha-MIR</strong> (<a href="Fig_10_vars_fits_Alpha_MIR.png">plot</a>)</li>
  <li><strong id="docs-internal-guid-d39bbb8f-b985-b565-2e06-14c2cbb857e3">VISNIR* </strong>(<a href="Fig_10_vars_fits_MPA_NIR.png">plot</a>)</li>
</ol>
<p class="style2">*Note: ExNa is difficult to predict and is good to show this from the models. Al prediction are poor for low values &lt;150 mg/kg as can be seen from the HTS-xt MIR models, though MPA model is not as good as the other two.</p>
<hr />
<table width="100%" border="0">
  <tr>
    <td>Last update: 
      <!-- #BeginDate format:Am1 -->June 22, 2014<!-- #EndDate --></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
