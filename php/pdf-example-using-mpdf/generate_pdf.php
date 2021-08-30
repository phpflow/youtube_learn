<?php
require_once __DIR__ . '/vendor/autoload.php';

function  generate_pdf($html = '') {
	$html = '<table width="60%" cellspacing="0">
			<thead>
				<tr>
					<th>Empid</th>
					<th>Name</th>
					<th>Salary</th>
					<th>Age</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				   <td>1</td>
				   <td>Tiger Nixon</td>
				   <td>320800</td>
				   <td>61</td>
				</tr>
				<tr>
				   <td>2</td>
				   <td>Garrett Winters</td>
				   <td>434343</td>
				   <td>63</td>
				</tr>
				<tr>
				   <td>3</td>
				   <td>Ashton Cox</td>
				   <td>86000</td>
				   <td>66</td>
				</tr>
				<tr>
				   <td>4</td>
				   <td>Cedric Kelly</td>
				   <td>433060</td>
				   <td>22</td>
				</tr>
				<tr>
				   <td>5</td>
				   <td>Airi Satou</td>
				   <td>162700</td>
				   <td>33</td>
				</tr>
				<tr>
				   <td>6</td>
				   <td>Brielle Williamson</td>
				   <td>372000</td>
				   <td>61</td>
				</tr>
				<tr>
				   <td>7</td>
				   <td>Herrod Chandler</td>
				   <td>137500</td>
				   <td>59</td>
				</tr>
				<tr>
				   <td>8</td>
				   <td>Rhona Davidson</td>
				   <td>327900</td>
				   <td>55</td>
				</tr>
				<tr>
				   <td>9</td>
				   <td>Colleen Hurst</td>
				   <td>205500</td>
				   <td>39</td>
				</tr>
				<tr>
				   <td>10</td>
				   <td>Sonya Frost</td>
				   <td>103600</td>
				   <td>23</td>
				</tr>
			</tbody>
		</table>';
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($html);

	//call watermark content aand image
	$mpdf->SetWatermarkText('phpflow.com');
	$mpdf->showWatermarkText = true;
	$mpdf->watermarkTextAlpha = 0.1;


	//save the file put which location you need folder/filname
	$mpdf->Output("phpflow.pdf", 'F');


	//out put in browser below output function
	$mpdf->Output();
}
generate_pdf();
?>