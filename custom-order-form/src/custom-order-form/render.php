<?php
// index.php
?>
<!DOCTYPE html>
<html lang="sk">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Objednávkový formulár</title>

	<style>
		.container {
			max-width: 1400px;
			margin: auto;
		}
	</style>
</head>
<body>

<div class="container">

	<!-- VAŠE ÚDAJE -->
	<div class="card">
		<h2>Vaše údaje</h2>

		<div class="form-grid">

			<label>Meno / Firma *</label>
			<input type="text" name="firma">

			<label>Adresa</label>
			<input type="text" name="adresa">

			<label>Mesto *</label>
			<input type="text" name="mesto">

			<label>IČO / IČ DPH</label>
			<input type="text" name="ico">

			<label>Telefón *</label>
			<input type="text" name="telefon">

			<label>Email *</label>
			<input type="email" name="email">

			<label>Materiál *</label>
			<select>
				<option>DTD Laminovaná</option>
				<option>MDF</option>
				<option>Plywood</option>
			</select>

			<label>Hrúbka</label>
			<select>
				<option>18mm</option>
				<option>16mm</option>
				<option>25mm</option>
			</select>

			<label>Výrobca</label>
			<select>
				<option>- vyber -</option>
				<option>Egger</option>
				<option>Kronospan</option>
			</select>

			<label>Dekor</label>
			<select>
				<option>- vyber -</option>
				<option>Biela</option>
				<option>Dub Sonoma</option>
			</select>

			<label>Iný dekor</label>
			<input type="text">

			<label>Doprava</label>
			<select>
				<option>nie, osobné vyzdvihnutie</option>
				<option>kuriér</option>
			</select>

			<label>Typ objednávky</label>
			<select>
				<option>Porez</option>
				<option>ABS hrana</option>
			</select>

			<label>Vaše označ. obj.</label>
			<input type="text">

		</div>
	</div>

	<!-- TABUĽKA -->
	<div class="card">

		<h2>Maximálny rozmer</h2>

		<div class="max-info">
			Maximálny rozmer: 2800 x 2070 mm
		</div>

		<div class="top-actions">
			<button type="button" class="btn btn-add" onclick="addRow()">
				+ Pridať riadok
			</button>
		</div>

		<div class="table-wrapper">

			<table id="cutTable">

				<thead>
				<tr>
					<th>#</th>
					<th>Dĺžka *</th>
					<th>Šírka *</th>
					<th>Ks *</th>
					<th>Názov</th>
					<th>Poznámka</th>
					<th>Hrúbka</th>
					<th>Orientácia</th>
					<th>Dolná</th>
					<th>Pravá</th>
					<th>Horná</th>
					<th>Ľavá</th>
					<th>Blok</th>
					<th>Akcia</th>
				</tr>
				</thead>

				<tbody id="tableBody">

				<tr>
					<td class="row-number">1</td>

					<td>
						<input type="number" name="dlzka[]">
					</td>

					<td>
						<input type="number" name="sirka[]">
					</td>

					<td>
						<input type="number" name="ks[]">
					</td>

					<td>
						<input type="text" name="nazov[]">
					</td>

					<td>
						<input type="text" name="poznamka[]">
					</td>

					<td>
						<select name="hrubka[]">
							<option>18mm</option>
							<option>16mm</option>
						</select>
					</td>

					<td>
						<select name="orientacia[]">
							<option>neotáčať</option>
							<option>otáčať</option>
						</select>
					</td>

					<td>
						<select name="dolna[]">
							<option>---</option>
							<option>ABS 0.5</option>
						</select>
					</td>

					<td>
						<select name="prava[]">
							<option>---</option>
							<option>ABS 0.5</option>
						</select>
					</td>

					<td>
						<select name="horna[]">
							<option>---</option>
							<option>ABS 0.5</option>
						</select>
					</td>

					<td>
						<select name="lava[]">
							<option>---</option>
							<option>ABS 0.5</option>
						</select>
					</td>

					<td>
						<input type="checkbox" name="blok[]">
					</td>

					<td>
						<button type="button"
								class="btn btn-remove"
								onclick="removeRow(this)">
							X
						</button>
					</td>
				</tr>

				</tbody>

			</table>

		</div>

	</div>

	<div class="card">
		<button type="submit" class="btn btn-add" onclick="sendInformation()">
			Odoslať
		</button>
	</div>


</div>

<script>

	function addRow() {

		let tableBody = document.getElementById('tableBody');

		let rowCount = tableBody.rows.length + 1;

		let row = `
            <tr>

                <td class="row-number">${rowCount}</td>

                <td>
                    <input type="number" name="dlzka[]">
                </td>

                <td>
                    <input type="number" name="sirka[]">
                </td>

                <td>
                    <input type="number" name="ks[]">
                </td>

                <td>
                    <input type="text" name="nazov[]">
                </td>

                <td>
                    <input type="text" name="poznamka[]">
                </td>

                <td>
                    <select name="hrubka[]">
                        <option>18mm</option>
                        <option>16mm</option>
                    </select>
                </td>

                <td>
                    <select name="orientacia[]">
                        <option>neotáčať</option>
                        <option>otáčať</option>
                    </select>
                </td>

                <td>
                    <select name="dolna[]">
                        <option>---</option>
                        <option>ABS 0.5</option>
                    </select>
                </td>

                <td>
                    <select name="prava[]">
                        <option>---</option>
                        <option>ABS 0.5</option>
                    </select>
                </td>

                <td>
                    <select name="horna[]">
                        <option>---</option>
                        <option>ABS 0.5</option>
                    </select>
                </td>

                <td>
                    <select name="lava[]">
                        <option>---</option>
                        <option>ABS 0.5</option>
                    </select>
                </td>

                <td>
                    <input type="checkbox" name="blok[]">
                </td>

                <td>
                    <button type="button"
                            class="btn btn-remove"
                            onclick="removeRow(this)">
                        X
                    </button>
                </td>

            </tr>
        `;

		tableBody.insertAdjacentHTML('beforeend', row);

	}

	function removeRow(button) {

		let row = button.closest('tr');

		row.remove();

		updateRowNumbers();

	}

	function updateRowNumbers() {

		let rows = document.querySelectorAll('#tableBody tr');

		rows.forEach((row, index) => {

			row.querySelector('.row-number').innerText = index + 1;

		});

	}

	function sendInformation() {
		alert("Odoslane")
	}

</script>

</body>
</html>
