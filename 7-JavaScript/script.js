const form = document.getElementsByTagName("form")[0]
form.addEventListener("submit", function () {
	const inputs = document.querySelectorAll("form label input")
	let table = document.querySelector("table")

	const description = inputs[0].value
	const quantity = inputs[1].value

	let tableRow = document.createElement("tr")

	let tableDataHeader = document.createElement("td")
	let tableDataValue = document.createElement("td")
	let tableDataRemove = document.createElement("td")

	tableRow.append(tableDataHeader)
	tableRow.append(tableDataValue)
	tableRow.append(tableDataRemove)

	tableDataHeader.innerHTML = description

	let tableDataValueInput = document.createElement("input")
	tableDataValue.append(tableDataValueInput)
	tableDataValueInput.setAttribute("value", quantity)

	let removeInput = document.createElement("input")
	tableDataRemove.append(removeInput)
	removeInput.setAttribute("type", "button")
	removeInput.setAttribute("value", "Remove")

	table.append(tableRow)
})
