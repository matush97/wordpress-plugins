<?php
// index.php
?>

<style>
	.custom-form {
		max-width: 1400px;
		margin: auto;
	}
</style>

<div class="custom-form">

	<!-- VAŠE ÚDAJE -->
	<div class="card">
		<h2>Vaše údaje</h2>

		<div class="form-grid">

			<label>Meno / Firma *</label>
			<input type="text" name="company">

			<label>Adresa</label>
			<input type="text" name="address">

			<label>Mesto *</label>
			<input type="text" name="city">

			<label>IČO / IČ DPH</label>
			<input type="text" name="ico">

			<label>Telefón *</label>
			<input type="text" name="phone">

			<label>Email *</label>
			<input type="email" name="email">

			<label>Materiál *</label>
			<select name="material">
				<option value="DTD Laminovana">DTD Laminovaná</option>
				<option value="DTD Dyhovana">DTD Dýhovaná</option>
				<option value="DTD Surova">DTD Surová</option>
				<option value="HDF (Sololit)">HDF (Sololit)</option>
				<option value="MDF Dýhovaná">MDF Dýhovaná</option>
				<option value="MDF obojst. biela">MDF obojst. biela</option>
				<option value="MDF Surova">MDF Surová</option>
				<option value="Pracovna doska 600">Pracovná doska 600</option>
				<option value="Pracovna doska 600 - 16mm">Pracovná doska 600 - 16mm</option>
				<option value="Pracovna doska 920">Pracovná doska 920</option>
				<option value="Rozne">Rozne</option>
				<option value="Senosan">Senosan</option>
				<option value="Zastena">Zástena</option>
			</select>

			<label>Hrúbka</label>
			<select name="thickness">
				<option value="10">10 mm</option>
				<option value="16">16 mm</option>
				<option value="18">18 mm</option>
				<option value="25">25 mm</option>
				<option value="36">36 mm</option>
			</select>

			<label>Dekor</label>
			<input type="text" name="decor">

			<label>Iný dekor</label>
			<input type="text" name="anotherDecor">

			<label>Doprava</label>
			<select name="transport">
				<option value="osobne vyzdvihnutie">Osobné vyzdvihnutie</option>
				<option value="kurier">Kuriér</option>
			</select>

			<label>Typ objednávky</label>
			<select name="orderType">
				<option value="porez">Porez</option>
				<option value="ina cenova ponuka">Iná cenová ponuka</option>
			</select>

			<label>Vaše označ. obj.</label>
			<input type="text" name="customerOrderReference">

		</div>
	</div>

	<!-- TABUĽKA -->
		<div class="card">

			<h2>Maximálny rozmer</h2>

			<div class="max-info">
				Maximálny rozmer: 2800 x 2070 mm
			</div>
			<div class="max-info">
				Špeciálna objednávka na pracovné dosky a zásteny.
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
						<th>Dĺžka *</th> <!--length-->
						<th>Šírka *</th> <!--width-->
						<th>Ks *</th>    <!--numberOfPieces-->
						<th>Názov</th>   <!--title-->
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
							<input type="number" name="length">
						</td>

						<td>
							<input type="number" name="width">
						</td>

						<td>
							<input type="number" name="numberOfPieces">
						</td>

						<td>
							<input type="text" name="title">
						</td>

						<td>
							<input type="text" name="note">
						</td>

						<td>
							<select name="hrubka">
								<option value="dvojita (duplak)">dvojitá (duplák)</option>
								<option value="dvojita s bielou">dvojitá s bielou</option>
							</select>
						</td>

						<td>
							<select name="orientacia">
								<option value="neotacat" >neotáčať</option>
								<option value="otacat">otáčať</option>
							</select>
						</td>

						<td>
							<select name="dolna">
								<option>Bez ABS</option>
								<option>0.5</option>
								<option>0.8</option>
								<option>1</option>
								<option>2</option>
							</select>
						</td>

						<td>
							<select name="prava">
								<option>Bez ABS</option>
								<option>0.5</option>
								<option>0.8</option>
								<option>1</option>
								<option>2</option>
							</select>
						</td>

						<td>
							<select name="horna">
								<option>Bez ABS</option>
								<option>0.5</option>
								<option>0.8</option>
								<option>1</option>
								<option>2</option>
							</select>
						</td>

						<td>
							<select name="lava">
								<option>Bez ABS</option>
								<option>0.5</option>
								<option>0.8</option>
								<option>1</option>
								<option>2</option>
							</select>
						</td>

						<td>
							<input type="number" name="blok">
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
                <input type="number" name="length">
            </td>

            <td>
                <input type="number" name="width">
            </td>

            <td>
                <input type="number" name="numberOfPieces">
            </td>

            <td>
                <input type="text" name="title">
            </td>

            <td>
                <input type="text" name="note">
            </td>

            <td>
                <select name="hrubka">
                    <option value="dvojita (duplak)">dvojitá (duplák)</option>
                    <option value="dvojita s bielou">dvojitá s bielou</option>
                </select>
            </td>

            <td>
                <select name="orientacia">
                    <option value="neotacat">neotáčať</option>
                    <option value="otacat">otáčať</option>
                </select>
            </td>

            <td>
                <select name="dolna">
                    <option>Bez ABS</option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <select name="prava">
                    <option>Bez ABS</option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <select name="horna">
                    <option>Bez ABS</option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <select name="lava">
                    <option>Bez ABS</option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <input type="number" name="blok">
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

	async function sendInformation() {

		const rows = [];
		document.querySelectorAll('#tableBody tr').forEach(row => {

			rows.push({
				length: row.querySelector('[name="length"]').value,
				width: row.querySelector('[name="width"]').value,
				numberOfPieces: row.querySelector('[name="numberOfPieces"]').value,
				title: row.querySelector('[name="title"]').value,
				note: row.querySelector('[name="note"]').value,
				hrubka: row.querySelector('[name="hrubka"]').value,
				orientacia: row.querySelector('[name="orientacia"]').value,
				dolna: row.querySelector('[name="dolna"]').value,
				prava: row.querySelector('[name="prava"]').value,
				horna: row.querySelector('[name="horna"]').value,
				lava: row.querySelector('[name="lava"]').value,
				blok: row.querySelector('[name="blok"]').value,
			});

		});

		let data = {
			company: document.querySelector('[name="company"]').value,
			address: document.querySelector('[name="address"]').value,
			city: document.querySelector('[name="city"]').value,
			ico: document.querySelector('[name="ico"]').value,
			phone: document.querySelector('[name="phone"]').value,
			email: document.querySelector('[name="email"]').value,

			material: document.querySelector('[name="material"]').value,
			thickness: document.querySelector('[name="thickness"]').value,
			decor: document.querySelector('[name="decor"]').value,
			anotherDecor: document.querySelector('[name="anotherDecor"]').value,
			transport: document.querySelector('[name="transport"]').value,
			orderType: document.querySelector('[name="orderType"]').value,
			customerOrderReference: document.querySelector('[name="customerOrderReference"]').value,

			rows
		};
		console.log("data", data);

		let response = await fetch('/wp-admin/admin-ajax.php?action=save_order_form', {

			method: 'POST',

			headers: {
				'Content-Type': 'application/json'
			},

			body: JSON.stringify(data)

		});

		let result = await response.json();

		console.log("result", result);
	}

</script>
