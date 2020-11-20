const commentForm = document.querySelector('#comments form')
commentForm.onsubmit = submitContent

function submitContent(e) {
	e.preventDefault()

	const newsID = document.querySelector('input[name=id]').value
	const lastCommentID = document.querySelector('.comment:last-of-type').dataset.id
	const username = document.querySelector('input[name=username]').value
	const commentText = document.querySelector('textarea[name=text]').value

	const request = new XMLHttpRequest()
	request.onload = receiveComments
	request.open('post', 'api/api_add_comment.php', true)
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
	request.send(
		encodeForAjax({ newsID: newsID, lastCommentID: lastCommentID, username: username, commentText: commentText })
	)
}

function receiveComments() {
	const response = JSON.parse(this.responseText)

	for (const comment of response) {
		const id = comment.id
		const username = comment.username
		const published = comment.published
		const text = comment.text

		const newCommentDOM = document.createElement('article')
		newCommentDOM.classList.add('comment')
		newCommentDOM.setAttribute('data-id', id)

		const userDOM = document.createElement('span')
		userDOM.classList.add('user')
		userDOM.innerHTML = username
		newCommentDOM.appendChild(userDOM)

		const dateDOM = document.createElement('date') // TODO format date
		dateDOM.classList.add('date')
		dateDOM.innerHTML = published
		newCommentDOM.appendChild(dateDOM)

		const textDOM = document.createElement('p')
		textDOM.innerHTML = text
		newCommentDOM.appendChild(textDOM)

		const commentsDOM = document.querySelector('#comments')
		commentsDOM.insertBefore(newCommentDOM, document.querySelector('#comments .comment'))

		document.querySelector('#comments > h1').innerHTML = commentsDOM.childNodes.length - 2 + ' comments'
	}
}

function encodeForAjax(data) {
	return Object.keys(data)
		.map(function (k) {
			return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
		})
		.join('&')
}
