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

<!--			<label>Materiál *</label>-->
<!--			<select name="material">-->
<!--				<option value="DTD Laminovana">DTD Laminovaná</option>-->
<!--				<option value="DTD Dyhovana">DTD Dýhovaná</option>-->
<!--				<option value="DTD Surova">DTD Surová</option>-->
<!--				<option value="HDF (Sololit)">HDF (Sololit)</option>-->
<!--				<option value="MDF Dýhovaná">MDF Dýhovaná</option>-->
<!--				<option value="MDF obojst. biela">MDF obojst. biela</option>-->
<!--				<option value="MDF Surova">MDF Surová</option>-->
<!--				<option value="Pracovna doska 600">Pracovná doska 600</option>-->
<!--				<option value="Pracovna doska 600 - 16mm">Pracovná doska 600 - 16mm</option>-->
<!--				<option value="Pracovna doska 920">Pracovná doska 920</option>-->
<!--				<option value="Rozne">Rozne</option>-->
<!--				<option value="Senosan">Senosan</option>-->
<!--				<option value="Zastena">Zástena</option>-->
<!--			</select>-->
<!---->
<!--			<label>Hrúbka</label>-->
<!--			<select name="thickness">-->
<!--				<option value="10">10 mm</option>-->
<!--				<option value="16">16 mm</option>-->
<!--				<option value="18">18 mm</option>-->
<!--				<option value="25">25 mm</option>-->
<!--				<option value="36">36 mm</option>-->
<!--				<option value="38">38 mm</option>-->
<!--			</select>-->
<!---->
<!--			<label>Dekor</label>-->
<!--			<input type="text" name="decor">-->
<!---->
<!--			<label>Iný dekor</label>-->
<!--			<input type="text" name="anotherDecor">-->

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
				<tbody id="tableBody">
				<!-- RIADOK 1: MATERIÁL -->
				<tr class="section1-material">

					<td rowspan="3" class="row-number">1</td>

					<td>
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
					</td>

					<td>
						<label>Hrúbka *</label>
						<select name="thickness">
							<option value="10">10 mm</option>
							<option value="16">16 mm</option>
							<option value="18">18 mm</option>
							<option value="25">25 mm</option>
							<option value="36">36 mm</option>
							<option value="38">38 mm</option>
						</select>
					</td>

					<td>
						<label>Dekor *</label>
						<input type="text" name="decor">
					</td>

					<td colspan="5"></td>

					<td rowspan="3">
						<button
							type="button"
							class="btn btn-remove"
							onclick="removeRow(this)">
							X
						</button>
					</td>

				</tr>


				<!-- RIADOK 2: ROZMER -->
				<tr class="section1-data">

					<td>
						<label>Názov</label>
						<input class="name-column" type="text" name="title">
					</td>

					<td>
						<label>Dĺžka *</label>
						<input type="text" name="length">
					</td>

					<td></td>

					<td>
						<label>Šírka *</label>
						<input type="text" name="width">
					</td>

					<td>
						<label>Ks *</label>
						<input type="text" name="numberOfPieces">
					</td>

					<td>
						<label>Hrúbka</label>
						<select name="hrubka">
							<option value=""></option>
							<option value="dvojita (duplak)">
								dvojitá (duplák)
							</option>
						</select>
					</td>

					<td>
						<label>Orientácia</label>
						<select name="orientacia">
							<option value="neotacat">neotáčať</option>
							<option value="otacat">otáčať</option>
						</select>
					</td>

				</tr>


				<!-- RIADOK 3: OLEPENIE -->
				<tr class="section2-data">

					<td>
						<label>Poznámka</label>
						<input type="text" name="note">
					</td>

					<td>
						<label>Predná</label>
						<select name="predna" class="edge-front">
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<td>
						<button type="button" class="copy-edge-btn">➜</button>
					</td>

					<td>
						<label>Zadná</label>
						<select name="zadna" class="edge-back">
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<td>
						<label>Ľavá</label>
						<select name="lava" class="edge-left">
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<td>
						<label>Pravá</label>
						<select name="prava" class="edge-right">
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<td>
						<label>Blok</label>
						<input type="number" name="blok">
					</td>

				</tr>

				</tbody>

			</table>

		</div>

		<div class="top-actions">
			<button type="button" class="btn btn-add" onclick="addRow()">
				+ Pridať ďalší rozmer
			</button>
		</div>

		<div style="padding-top: 10px">
			<label>Doplňujúce informácie</label>
			<input
				name="additionalInformation"
				placeholder="Sem môžete doplniť dodatočné informácie k objednávke..."/>
		</div>

		<button
			type="button"
			class="btn btn-add"
			onclick="sendInformation()">
			Odoslať
		</button>

	</div>

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
		<label>Ak chcete vyplniť šablónu bez použitia formulára, stiahnite si, prosím, našu šablónu a po jej vyplnení ju
			nahrajte nižšie.</label>

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

		<button
			type="button"
			class="btn btn-add"
			onclick="sendInformationFromTemplateModal()">
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

		const tableBody = document.getElementById('tableBody');

		const rowCount =
			document.querySelectorAll('#tableBody .section1-material').length + 1;

		const row = `

        <!-- 1. RIADOK -->
        <tr class="section1-material">

            <td rowspan="3" class="row-number">
                ${rowCount}
            </td>

            <td>
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
                    <option value="Pracovna doska 600 - 16mm">
                        Pracovná doska 600 - 16mm
                    </option>
                    <option value="Pracovna doska 920">Pracovná doska 920</option>
                    <option value="Rozne">Rozne</option>
                    <option value="Senosan">Senosan</option>
                    <option value="Zastena">Zástena</option>
                </select>
            </td>

            <td>
                <label>Hrúbka *</label>
                <select name="thickness">
                    <option value="10">10 mm</option>
                    <option value="16">16 mm</option>
                    <option value="18">18 mm</option>
                    <option value="25">25 mm</option>
                    <option value="36">36 mm</option>
                    <option value="38">38 mm</option>
                </select>
            </td>

            <td>
                <label>Dekor *</label>
                <input type="text" name="decor">
            </td>

            <td colspan="5"></td>

            <td rowspan="3">
                <button
                    type="button"
                    class="btn btn-remove"
                    onclick="removeRow(this)">
                    X
                </button>
            </td>

        </tr>

        <!-- 2. RIADOK -->
        <tr class="section1-data">

            <td>
                <label>Názov</label>
                <input class="name-column" type="text" name="title">
            </td>

            <td>
                <label>Dĺžka *</label>
                <input type="text" name="length">
            </td>

            <td></td>

            <td>
                <label>Šírka *</label>
                <input type="text" name="width">
            </td>

            <td>
                <label>Ks *</label>
                <input type="text" name="numberOfPieces">
            </td>

            <td>
                <label>Hrúbka</label>
                <select name="hrubka">
                    <option value=""></option>
                    <option value="dvojita (duplak)">
                        dvojitá (duplák)
                    </option>
                </select>
            </td>

            <td>
                <label>Orientácia</label>
                <select name="orientacia">
                    <option value="neotacat">neotáčať</option>
                    <option value="otacat">otáčať</option>
                </select>
            </td>

        </tr>

        <!-- 3. RIADOK -->
        <tr class="section2-data">

            <td>
                <label>Poznámka</label>
                <input type="text" name="note">
            </td>

            <td>
                <label>Predná</label>
                <select name="predna" class="edge-front">
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <button type="button" class="copy-edge-btn">➜</button>
            </td>

            <td>
                <label>Zadná</label>
                <select name="zadna" class="edge-back">
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <label>Ľavá</label>
                <select name="lava" class="edge-left">
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <label>Pravá</label>
                <select name="prava" class="edge-right">
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </td>

            <td>
                <label>Blok</label>
                <input type="number" name="blok">
            </td>

        </tr>
    `;

		tableBody.insertAdjacentHTML('beforeend', row);
	}

	function removeRow(button) {

		const firstRow = button.closest('.section1-material');

		if (!firstRow) {
			return;
		}

		const row2 = firstRow.nextElementSibling;
		const row3 = row2.nextElementSibling;

		firstRow.remove();
		row2.remove();
		row3.remove();

		updateRowNumbers();
	}

	function updateRowNumbers() {

		const numbers =
			document.querySelectorAll('#tableBody .row-number');

		numbers.forEach((cell, index) => {
			cell.textContent = index + 1;
		});
	}

	async function sendInformation() {

		const getValue = (selector) => {
			const element = document.querySelector(selector);

			if (!element) {
				console.error('Element sa nenašiel:', selector);
				return '';
			}

			return element.value ?? '';
		};


		const materialRows = document.querySelectorAll(
			'#tableBody .section1-material'
		);

		const rows = [];


		materialRows.forEach(materialRow => {

			const dimensionRow = materialRow.nextElementSibling;
			const edgeRow = dimensionRow
				? dimensionRow.nextElementSibling
				: null;

			const val = (row, name) => {

				if (!row) {
					return '';
				}

				const element = row.querySelector(
					`[name="${name}"]`
				);

				return element ? element.value : '';
			};


			rows.push({

				// MATERIÁL
				material: val(materialRow, 'material'),
				thickness: val(materialRow, 'thickness'),
				decor: val(materialRow, 'decor'),

				// ROZMER
				title: val(dimensionRow, 'title'),
				length: val(dimensionRow, 'length'),
				width: val(dimensionRow, 'width'),
				numberOfPieces: val(dimensionRow, 'numberOfPieces'),
				hrubka: val(dimensionRow, 'hrubka'),
				orientacia: val(dimensionRow, 'orientacia'),

				// OLEPENIE
				note: val(edgeRow, 'note'),
				predna: val(edgeRow, 'predna'),
				zadna: val(edgeRow, 'zadna'),
				lava: val(edgeRow, 'lava'),
				prava: val(edgeRow, 'prava'),
				blok: val(edgeRow, 'blok')
			});

		});


		window.formData = {

			company: getValue('[name="company"]'),
			address: getValue('[name="address"]'),
			city: getValue('[name="city"]'),
			ico: getValue('[name="ico"]'),
			phone: getValue('[name="phone"]'),
			email: getValue('[name="email"]'),

			transport: getValue('[name="transport"]'),
			orderType: getValue('[name="orderType"]'),
			customerOrderReference:
				getValue('[name="customerOrderReference"]'),

			additionalInformation:
				getValue('[name="additionalInformation"]'),

			rows: rows
		};

		showModal(window.formData);
	}

	function showModal(data) {

		let summary = `
        <h4>Údaje zákazníka</h4>

        <p><strong>Firma:</strong> ${data.company}</p>
        <p><strong>Adresa:</strong> ${data.address}</p>
        <p><strong>Mesto:</strong> ${data.city}</p>
        <p><strong>IČO:</strong> ${data.ico}</p>
        <p><strong>Email:</strong> ${data.email}</p>
        <p><strong>Telefón:</strong> ${data.phone}</p>

        <hr>

        <h4>Rozmery</h4>
    `;


		data.rows.forEach((row, index) => {

			summary += `
            <div style="
                border:1px solid #ddd;
                padding:10px;
                margin-bottom:10px;
            ">

                <strong>Rozmer ${index + 1}</strong>

                <p>
                    <strong>Materiál:</strong>
                    ${row.material}
                </p>

                <p>
                    <strong>Hrúbka materiálu:</strong>
                    ${row.thickness}
                </p>

                <p>
                    <strong>Dekor:</strong>
                    ${row.decor}
                </p>

                <p>
                    <strong>Názov:</strong>
                    ${row.title}
                </p>

                <p>
                    <strong>Rozmer:</strong>
                    ${row.length} × ${row.width} mm
                </p>

                <p>
                    <strong>Ks:</strong>
                    ${row.numberOfPieces}
                </p>

                <p>
                    <strong>Hrúbka / duplák:</strong>
                    ${row.hrubka}
                </p>

                <p>
                    <strong>Orientácia:</strong>
                    ${row.orientacia}
                </p>

                <p>
                    <strong>Poznámka:</strong>
                    ${row.note}
                </p>

                <p>
                    <strong>Predná:</strong>
                    ${row.predna}
                    &nbsp;
                    <strong>Zadná:</strong>
                    ${row.zadna}
                    &nbsp;
                    <strong>Ľavá:</strong>
                    ${row.lava}
                    &nbsp;
                    <strong>Pravá:</strong>
                    ${row.prava}
                    &nbsp;
                    <strong>Blok:</strong>
                    ${row.blok}
                </p>

            </div>
        `;

		});


		summary += `
        <hr>

        <p>
            <strong>Doprava:</strong>
            ${data.transport}
        </p>

        <p>
            <strong>Typ objednávky:</strong>
            ${data.orderType}
        </p>

        <p>
            <strong>Označenie objednávky:</strong>
            ${data.customerOrderReference}
        </p>

        <p>
            <strong>Doplňujúce informácie:</strong>
            ${data.additionalInformation}
        </p>
    `;


		document.getElementById('modalSummary').innerHTML = summary;

		document
			.getElementById('confirmModal')
			.classList.add('show');

		document
			.getElementById('confirmModal')
			.classList.remove('hidden');
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

	document.addEventListener('click', function (e) {

		if (!e.target.classList.contains('copy-edge-btn')) {
			return;
		}

		const row = e.target.closest('tr');

		const value =
			row.querySelector('.edge-front').value;

		row.querySelector('.edge-back').value = value;
		row.querySelector('.edge-left').value = value;
		row.querySelector('.edge-right').value = value;
	});
</script>
