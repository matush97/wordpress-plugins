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

				<!-- =========================
					 ROZMER 1 - RIADOK 1
					 ========================= -->
				<tr class="cut-row cut-row-top">

					<!-- ČÍSLO -->
					<td rowspan="2" class="row-number">
						1
					</td>

					<!-- MATERIÁL -->
					<td class="col-material">
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
							<option value="Pracovna doska 920">
								Pracovná doska 920
							</option>
							<option value="Rozne">Rozne</option>
							<option value="Senosan">Senosan</option>
							<option value="Zastena">Zástena</option>
						</select>
					</td>

					<!-- HRÚBKA MATERIÁLU -->
					<td class="col-material-thickness">
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

					<!-- DEKOR -->
					<td class="col-decor">
						<label>Dekor *</label>

						<input
							type="text"
							name="decor"
							placeholder=""
						>
					</td>

					<!-- NÁZOV -->
					<td class="col-title">
						<label>Názov</label>

						<input
							type="text"
							name="title"
						>
					</td>

					<!-- DĹŽKA -->
					<td class="col-length">
						<label>Dĺžka *</label>

						<input
							type="text"
							name="length"
						>
					</td>

					<!-- ŠÍRKA -->
					<td class="col-width">
						<label>Šírka *</label>

						<input
							type="text"
							name="width"
						>
					</td>

					<!-- KS -->
					<td class="col-pieces">
						<label>Ks *</label>

						<input
							type="text"
							name="numberOfPieces"
						>
					</td>

					<!-- HRÚBKA DIELCA -->
					<td class="col-part-thickness">
						<label>Hrúbka</label>

						<select name="hrubka">
							<option value=""></option>
							<option value="dvojita (duplak)">
								dvojitá (duplák)
							</option>
						</select>
					</td>

					<!-- ORIENTÁCIA -->
					<td class="col-orientation">
						<label>Orientácia</label>

						<select name="orientacia">
							<option value="neotacat">
								neotáčať
							</option>

							<option value="otacat">
								otáčať
							</option>
						</select>
					</td>

					<!-- ODSTRÁNIŤ -->
					<td rowspan="2" class="col-remove">
						<button
							type="button"
							class="btn btn-remove"
							onclick="removeRow(this)"
						>
							X
						</button>
					</td>

				</tr>


				<!-- =========================
					 ROZMER 1 - RIADOK 2
					 ========================= -->
				<tr class="cut-row cut-row-bottom">

					<!-- POZNÁMKA -->
					<td
						colspan="3"
						class="col-note"
					>
						<label>Poznámka</label>

						<input
							type="text"
							name="note"
						>
					</td>

					<!-- PREDNÁ -->
					<td class="col-edge">
						<label>Predná</label>

						<select
							name="predna"
							class="edge-front"
						>
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<!-- ŠÍPKA -->
					<td class="col-arrow">
						<button
							type="button"
							class="copy-edge-btn"
						>
							➜
						</button>
					</td>

					<!-- ZADNÁ -->
					<td class="col-edge">
						<label>Zadná</label>

						<select
							name="zadna"
							class="edge-back"
						>
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<!-- ĽAVÁ -->
					<td class="col-edge">
						<label>Ľavá</label>

						<select
							name="lava"
							class="edge-left"
						>
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<!-- PRAVÁ -->
					<td class="col-edge">
						<label>Pravá</label>

						<select
							name="prava"
							class="edge-right"
						>
							<option value=""></option>
							<option>0.5</option>
							<option>0.8</option>
							<option>1</option>
							<option>2</option>
						</select>
					</td>

					<!-- BLOK -->
					<td class="col-block">
						<label>Blok</label>

						<input
							type="number"
							name="blok"
						>
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
			document.querySelectorAll('#tableBody .cut-row-top').length + 1;

		const row = `

        <!-- =========================
             RIADOK 1
             ========================= -->
        <tr class="cut-row cut-row-top">

            <!-- ČÍSLO -->
            <td rowspan="2" class="row-number">
                ${rowCount}
            </td>

            <!-- MATERIÁL -->
            <td class="col-material">
                <label>Materiál *</label>

                <select name="material">
                    <option value="DTD Laminovana">DTD Laminovaná</option>
                    <option value="DTD Dyhovana">DTD Dýhovaná</option>
                    <option value="DTD Surova">DTD Surová</option>
                    <option value="HDF (Sololit)">HDF (Sololit)</option>
                    <option value="MDF Dýhovaná">MDF Dýhovaná</option>
                    <option value="MDF obojst. biela">
                        MDF obojst. biela
                    </option>
                    <option value="MDF Surova">MDF Surová</option>
                    <option value="Pracovna doska 600">
                        Pracovná doska 600
                    </option>
                    <option value="Pracovna doska 600 - 16mm">
                        Pracovná doska 600 - 16mm
                    </option>
                    <option value="Pracovna doska 920">
                        Pracovná doska 920
                    </option>
                    <option value="Rozne">Rozne</option>
                    <option value="Senosan">Senosan</option>
                    <option value="Zastena">Zástena</option>
                </select>
            </td>

            <!-- HRÚBKA -->
            <td class="col-material-thickness">
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

            <!-- DEKOR -->
            <td class="col-decor">
                <label>Dekor *</label>

                <input
                    type="text"
                    name="decor"
                >
            </td>

            <!-- NÁZOV -->
            <td class="col-title">
                <label>Názov</label>

                <input
                    type="text"
                    name="title"
                >
            </td>

            <!-- DĹŽKA -->
            <td class="col-length">
                <label>Dĺžka *</label>

                <input
                    type="text"
                    name="length"
                >
            </td>

            <!-- ŠÍRKA -->
            <td class="col-width">
                <label>Šírka *</label>

                <input
                    type="text"
                    name="width"
                >
            </td>

            <!-- KS -->
            <td class="col-pieces">
                <label>Ks *</label>

                <input
                    type="text"
                    name="numberOfPieces"
                >
            </td>

            <!-- HRÚBKA DIELCA -->
            <td class="col-part-thickness">
                <label>Hrúbka</label>

                <select name="hrubka">
                    <option value=""></option>
                    <option value="dvojita (duplak)">
                        dvojitá (duplák)
                    </option>
                </select>
            </td>

            <!-- ORIENTÁCIA -->
            <td class="col-orientation">
                <label>Orientácia</label>

                <select name="orientacia">
                    <option value="neotacat">
                        neotáčať
                    </option>

                    <option value="otacat">
                        otáčať
                    </option>
                </select>
            </td>

            <!-- ODSTRÁNIŤ -->
            <td rowspan="2" class="col-remove">

                <button
                    type="button"
                    class="btn btn-remove"
                    onclick="removeRow(this)"
                >
                    X
                </button>

            </td>

        </tr>


        <!-- =========================
             RIADOK 2
             ========================= -->
        <tr class="cut-row cut-row-bottom">

            <!-- POZNÁMKA -->
            <td
                colspan="3"
                class="col-note"
            >
                <label>Poznámka</label>

                <input
                    type="text"
                    name="note"
                >
            </td>

            <!-- PREDNÁ -->
            <td class="col-edge">

                <label>Predná</label>

                <select
                    name="predna"
                    class="edge-front"
                >
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>

            </td>

            <!-- ŠÍPKA -->
            <td class="col-arrow">

                <button
                    type="button"
                    class="copy-edge-btn"
                >
                    ➜
                </button>

            </td>

            <!-- ZADNÁ -->
            <td class="col-edge">

                <label>Zadná</label>

                <select
                    name="zadna"
                    class="edge-back"
                >
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>

            </td>

            <!-- ĽAVÁ -->
            <td class="col-edge">

                <label>Ľavá</label>

                <select
                    name="lava"
                    class="edge-left"
                >
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>

            </td>

            <!-- PRAVÁ -->
            <td class="col-edge">

                <label>Pravá</label>

                <select
                    name="prava"
                    class="edge-right"
                >
                    <option value=""></option>
                    <option>0.5</option>
                    <option>0.8</option>
                    <option>1</option>
                    <option>2</option>
                </select>

            </td>

            <!-- BLOK -->
            <td class="col-block">

                <label>Blok</label>

                <input
                    type="number"
                    name="blok"
                >

            </td>

        </tr>
    `;

		tableBody.insertAdjacentHTML('beforeend', row);
	}

	function removeRow(button) {

		const firstRow = button.closest('.cut-row-top');

		if (!firstRow) {
			return;
		}

		const secondRow = firstRow.nextElementSibling;

		if (secondRow) {
			secondRow.remove();
		}

		firstRow.remove();

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


		const topRows = document.querySelectorAll(
			'#tableBody .cut-row-top'
		);

		const rows = [];

		topRows.forEach(topRow => {

			const bottomRow = topRow.nextElementSibling;

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

				// =========================
				// MATERIÁL
				// =========================

				material: val(topRow, 'material'),
				thickness: val(topRow, 'thickness'),
				decor: val(topRow, 'decor'),


				// =========================
				// ROZMER
				// =========================

				title: val(topRow, 'title'),
				length: val(topRow, 'length'),
				width: val(topRow, 'width'),
				numberOfPieces: val(topRow, 'numberOfPieces'),

				hrubka: val(topRow, 'hrubka'),
				orientacia: val(topRow, 'orientacia'),


				// =========================
				// OLEPENIE
				// =========================

				note: val(bottomRow, 'note'),
				predna: val(bottomRow, 'predna'),
				zadna: val(bottomRow, 'zadna'),
				lava: val(bottomRow, 'lava'),
				prava: val(bottomRow, 'prava'),
				blok: val(bottomRow, 'blok')

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

	function resetOrderForm() {

		// ==========================================
		// ZÁKLADNÉ ÚDAJE ZÁKAZNÍKA
		// ==========================================

		const fields = [
			'company',
			'address',
			'city',
			'ico',
			'phone',
			'email',
			'customerOrderReference',
			'additionalInformation'
		];

		fields.forEach(name => {

			const field = document.querySelector(`[name="${name}"]`);

			if (field) {
				field.value = '';
			}

		});


		// ==========================================
		// SELECTY - ZÁKLADNÉ ÚDAJE
		// ==========================================

		const transport = document.querySelector('[name="transport"]');

		if (transport) {
			transport.selectedIndex = 0;
		}


		const orderType = document.querySelector('[name="orderType"]');

		if (orderType) {
			orderType.selectedIndex = 0;
		}


		// ==========================================
		// TABUĽKA ROZMEROV
		// ==========================================

		const tableBody = document.getElementById('tableBody');

		if (!tableBody) {
			window.formData = null;
			return;
		}


		// ==========================================
		// ODSTRÁNENIE VŠETKÝCH PRIDANÝCH ROZMEROV
		// ==========================================

		const topRows =
			tableBody.querySelectorAll('.cut-row-top');

		topRows.forEach((topRow, index) => {

			// Prvý rozmer ponecháme.
			if (index === 0) {
				return;
			}

			// Druhý riadok patriaci k tomuto rozmeru.
			const bottomRow = topRow.nextElementSibling;

			if (bottomRow) {
				bottomRow.remove();
			}

			topRow.remove();

		});


		// ==========================================
		// PRVÝ ROZMER
		// ==========================================

		const firstTopRow =
			tableBody.querySelector('.cut-row-top');

		const firstBottomRow =
			firstTopRow?.nextElementSibling;


		if (!firstTopRow) {
			window.formData = null;
			return;
		}


		// ==========================================
		// MATERIÁL
		// ==========================================

		const material =
			firstTopRow.querySelector('[name="material"]');

		if (material) {
			material.selectedIndex = 0;
		}


		// ==========================================
		// HRÚBKA MATERIÁLU
		// ==========================================

		const thickness =
			firstTopRow.querySelector('[name="thickness"]');

		if (thickness) {
			thickness.selectedIndex = 0;
		}


		// ==========================================
		// DEKOR
		// ==========================================

		const decor =
			firstTopRow.querySelector('[name="decor"]');

		if (decor) {
			decor.value = '';
		}


		// ==========================================
		// NÁZOV
		// ==========================================

		const title =
			firstTopRow.querySelector('[name="title"]');

		if (title) {
			title.value = '';
		}


		// ==========================================
		// DĹŽKA
		// ==========================================

		const length =
			firstTopRow.querySelector('[name="length"]');

		if (length) {
			length.value = '';
		}


		// ==========================================
		// ŠÍRKA
		// ==========================================

		const width =
			firstTopRow.querySelector('[name="width"]');

		if (width) {
			width.value = '';
		}


		// ==========================================
		// KS
		// ==========================================

		const pieces =
			firstTopRow.querySelector('[name="numberOfPieces"]');

		if (pieces) {
			pieces.value = '';
		}


		// ==========================================
		// HRÚBKA DIELCA
		// ==========================================

		const hrubka =
			firstTopRow.querySelector('[name="hrubka"]');

		if (hrubka) {
			hrubka.selectedIndex = 0;
		}


		// ==========================================
		// ORIENTÁCIA
		// ==========================================

		const orientacia =
			firstTopRow.querySelector('[name="orientacia"]');

		if (orientacia) {
			orientacia.selectedIndex = 0;
		}


		// ==========================================
		// POZNÁMKA
		// ==========================================

		const note =
			firstBottomRow?.querySelector('[name="note"]');

		if (note) {
			note.value = '';
		}


		// ==========================================
		// PREDNÁ
		// ==========================================

		const predna =
			firstBottomRow?.querySelector('[name="predna"]');

		if (predna) {
			predna.selectedIndex = 0;
		}


		// ==========================================
		// ZADNÁ
		// ==========================================

		const zadna =
			firstBottomRow?.querySelector('[name="zadna"]');

		if (zadna) {
			zadna.selectedIndex = 0;
		}


		// ==========================================
		// ĽAVÁ
		// ==========================================

		const lava =
			firstBottomRow?.querySelector('[name="lava"]');

		if (lava) {
			lava.selectedIndex = 0;
		}


		// ==========================================
		// PRAVÁ
		// ==========================================

		const prava =
			firstBottomRow?.querySelector('[name="prava"]');

		if (prava) {
			prava.selectedIndex = 0;
		}


		// ==========================================
		// BLOK
		// ==========================================

		const blok =
			firstBottomRow?.querySelector('[name="blok"]');

		if (blok) {
			blok.value = '';
		}


		// ==========================================
		// ČÍSLOVANIE
		// ==========================================

		updateRowNumbers();


		// ==========================================
		// VYMAZANIE ULOŽENÝCH DÁT
		// ==========================================

		window.formData = null;
	}

	async function confirmSend() {

		try {

			const response = await fetch(
				'/wp-admin/admin-ajax.php?action=save_order_form',
				{
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify(window.formData)
				}
			);

			const result = await response.json();

			console.log("result", result);


			// ==========================================
			// KONTROLA ÚSPEŠNÉHO ODOSLANIA
			// ==========================================

			if (!result.success) {

				alert(
					result.data?.message ||
					'Objednávku sa nepodarilo odoslať.'
				);

				return;
			}


			// ==========================================
			// ODOSLANÉ ÚSPEŠNE
			// ==========================================

			closeModal();

			resetOrderForm();

			alert("Objednávka bola úspešne odoslaná.");

		} catch (error) {

			console.error(error);

			alert(
				'Pri odosielaní objednávky nastala chyba.'
			);
		}
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
