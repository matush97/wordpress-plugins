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
				<option value="38">38 mm</option>
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

		<div class="max-dimensions-header">
			<div class="max-dimensions-text">
				<h2>Maximálny rozmer</h2>
				<p>Maximálny rozmer: 2800 x 2070 mm</p>
				<p>Pri zadaní pracovnej dosky alebo zásteny vytvorte novú objednávku.</p>
			</div>

			<div class="max-dimensions-image">
				<img src="https://www.altaviafactory.sk/wp-content/uploads/2026/06/max-dimensions.png"
					 alt="Maximálny rozmer">
			</div>
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
					<th>Predná</th>
					<th>Zadná</th>
					<th>Ľavá</th>
					<th>Pravá</th>
					<th>Blok</th>
					<th>Akcia</th>
				</tr>
				</thead>

				<tbody id="tableBody">

				<tr>
					<td class="row-number">1</td>

					<td>
						<input type="text" name="length">
					</td>

					<td>
						<input type="text" name="width">
					</td>

					<td>
						<input type="text" name="numberOfPieces">
					</td>

					<td>
						<input type="text" name="title">
					</td>

					<td>
						<input type="text" name="note">
					</td>

					<td>
						<select name="hrubka">
							<option value=""></option>
							<option value="dvojita (duplak)">dvojitá (duplák)</option>
						</select>
					</td>

					<td>
						<select name="orientacia">
							<option value="neotacat">neotáčať</option>
							<option value="otacat">otáčať</option>
						</select>
					</td>

					<td>
						<select name="predna" class="edge-front">
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<td>
						<select name="zadna" class="edge-back">
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<td>
						<select name="lava" class="edge-left">
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<td>
						<select name="prava" class="edge-right">
							<option value=""></option>
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

		<div class="top-actions">
			<button type="button" class="btn btn-add" onclick="addRow()">
				+ Pridať riadok
			</button>
		</div>

		<div style="padding-top: 10px">
			<label>Doplňujúce informácie</label>
			<input
				name="additionalInformation"
				placeholder="Sem môžete doplniť dodatočné informácie k objednávke..." />
		</div>

		<button type="submit" class="btn btn-add" onclick="sendInformation()">
			Odoslať
		</button>

	</div>
`
	<div id="confirmModal" class="modal hidden">
		<div class="modal-content">
			<h3>Potvrdenie objednávky</h3>

			<div id="modalSummary"></div>

			<div class="modal-actions">
				<button class="btn btn-add" type="button" onclick="closeModal()">Zrušiť</button>
				<button class="btn btn-add" type="button" onclick="confirmSend()">Potvrdiť odoslanie</button>
			</div>
		</div>
	</div>

	<div class="card">
		<h2>Vyplnenie vlastnej šablóny</h2>
		<label>Ak chcete vyplniť šablónu bez použitia formulára, stiahnite si, prosím, našu šablónu a po jej vyplnení ju nahrajte nižšie.</label>

		<div style="padding-top: 10px">
			<a href="https://www.altaviafactory.sk/wp-content/uploads/2026/06/TABULKA-POREZ.xlsx"
			   class="btn btn-download"
			   download>
				Stiahnuť Excel šablónu
			</a>
		</div>

		<div style="padding-top: 20px">
			<label>Priložiť vyplnený Excel</label>

			<input type="file"
				   name="customer_excel"
				   accept=".xlsx,.xls,.csv"
			/>
		</div>

		<button type="submit" class="btn btn-add" onclick="sendInformationFromTemplateModal()">
			Odoslať
		</button>
	</div>

	<div id="confirmModalTemplate" class="modal hidden">
		<div class="modal-content">
			<h3>Potvrdenie objednávky</h3>

			<div id="modalSummaryTemplate"></div>

			<div class="modal-actions">
				<button class="btn btn-add" type="button" onclick="closeModalTemplate()">Zrušiť</button>
				<button class="btn btn-add" type="button" onclick="confirmSendTemplate()">Potvrdiť odoslanie</button>
			</div>
		</div>
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
                <input type="text" name="length">
            </td>

            <td>
                <input type="text" name="width">
            </td>

            <td>
                <input type="text" name="numberOfPieces">
            </td>

            <td>
                <input type="text" name="title">
            </td>

            <td>
                <input type="text" name="note">
            </td>

            <td>
                <select name="hrubka">
                    <option value=""></option>
                    <option value="dvojita (duplak)">dvojitá (duplák)</option>
                </select>
            </td>

            <td>
                <select name="orientacia">
                    <option value="neotacat">neotáčať</option>
                    <option value="otacat">otáčať</option>
                </select>
            </td>

			<td>
                <select name="predna" class="edge-front">
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <select name="zadna" class="edge-back">
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

			<td>
                <select name="lava" class="edge-left">
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <select name="prava" class="edge-right">
                    <option value=""></option>
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
				predna: row.querySelector('[name="predna"]').value,
				zadna: row.querySelector('[name="zadna"]').value,
				lava: row.querySelector('[name="lava"]').value,
				prava: row.querySelector('[name="prava"]').value,
				blok: row.querySelector('[name="blok"]').value,
			});

		});

		window.formData = {
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

		showModal(window.formData);
	}

	function showModal(data) {
		let summary = `
        <p><strong>Firma:</strong> ${data.company}</p>
        <p><strong>Email:</strong> ${data.email}</p>
        <p><strong>Telefón:</strong> ${data.phone}</p>
        <hr>
        <p><strong>Materiál:</strong> ${data.material}</p>
        <p><strong>Hrúbka:</strong> ${data.thickness}</p>
        <p><strong>Dekor:</strong> ${data.decor}</p>
        <hr>
        <p><strong>Počet riadkov:</strong> ${data.rows.length}</p>
    `;

		document.getElementById('modalSummary').innerHTML = summary;
		document.getElementById('confirmModal').classList.add('show');
		document.getElementById('confirmModal').classList.remove('hidden');
	}

	function closeModal() {
		document.getElementById('confirmModal').classList.add('hidden');
	}

	async function confirmSend() {

		closeModal();

		let response = await fetch('/wp-admin/admin-ajax.php?action=save_order_form', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(window.formData)
		});

		let result = await response.json();

		console.log("result", result);

		alert("Objednávka odoslaná");
	}

	function sendInformationFromTemplateModal() {
		let summary = "Chceli by ste odoslať šablónu?";

		document.getElementById('modalSummaryTemplate').innerHTML = summary;
		document.getElementById('confirmModalTemplate').classList.add('show');
		document.getElementById('confirmModalTemplate').classList.remove('hidden');
	}

	function closeModalTemplate() {
		document.getElementById('confirmModalTemplate').classList.add('hidden');
	}

	async function confirmSendTemplate() {

		closeModalTemplate();

		const fileInput = document.querySelector('[name="customer_excel"]');

		const formData = new FormData();

		formData.append(
			'customer_excel',
			fileInput.files[0]
		);

		let response = await fetch(
			'/wp-admin/admin-ajax.php?action=save_order_form_template',
			{
				method: 'POST',
				body: formData
			}
		);

		let result = await response.json();

		console.log(result);
	}

	document.addEventListener('keydown', function (e) {

		if (e.key !== 'Enter') {
			return;
		}

		// nechceme odosielať formulár
		e.preventDefault();

		const focusableElements = Array.from(
			document.querySelectorAll(
				'input, select, textarea, button, a[href], [tabindex]:not([tabindex="-1"])'
			)
		).filter(el =>
			!el.disabled &&
			el.offsetParent !== null
		);

		const currentIndex = focusableElements.indexOf(document.activeElement);

		if (currentIndex === -1) {
			return;
		}

		const nextElement = focusableElements[currentIndex + 1];

		if (nextElement) {
			nextElement.focus();
		}
	});
</script>
