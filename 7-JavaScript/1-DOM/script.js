const form = document.getElementsByTagName('form')[0]
form.addEventListener('submit', e => {
	e.preventDefault()

	const inputs = document.querySelectorAll('form label input')
	const table = document.querySelector('table')
	const total = document.querySelector('footer span')

	// get the values
	const description = inputs[0].value
	const quantity = inputs[1].value

	// create the table row
	const tableRow = document.createElement('tr')

	const tableDataHeader = document.createElement('td')
	const tableDataValue = document.createElement('td')
	const tableDataRemove = document.createElement('td')

	tableRow.append(tableDataHeader)
	tableRow.append(tableDataValue)
	tableRow.append(tableDataRemove)

	tableDataHeader.innerHTML = description

	const tableDataValueInput = document.createElement('input')
	tableDataValue.append(tableDataValueInput)
	tableDataValueInput.setAttribute('value', quantity)

	const removeInput = document.createElement('input')
	tableDataRemove.append(removeInput)
	removeInput.setAttribute('type', 'button')
	removeInput.setAttribute('value', 'Remove')

	tableRow.setAttribute('last_value', quantity)

	table.append(tableRow)

	// remove listener
	removeInput.addEventListener('click', _ => {
		total.innerHTML = +total.innerHTML - +quantity
		
		tableRow.remove()
	})

	// update listener
	tableDataValueInput.addEventListener('input', _ => {
		const last = +tableRow.getAttribute('last_value')
		total.innerHTML = +total.innerHTML -last + +tableDataValueInput.value
		tableRow.setAttribute('last_value', tableDataValueInput.value)
	})

	// increment total
	total.innerHTML = +total.innerHTML + +quantity
})
