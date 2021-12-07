document.addEventListener("DOMContentLoaded",function() {

    const sendRequest = (method, url, body = null) => {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();

            xhr.open(method, url);

            xhr.responseType = 'json';
            xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');

            xhr.onload = () => {
                if (xhr.status >= 400) {
                    reject(xhr.response);
                }
                else {
                    resolve(xhr.response);
                }
            }

            xhr.send(JSON.stringify(body));

            xhr.onerror = () => {
                reject(xhr.response);
            }

        })
    }

    const form = document.getElementById('form-box');
    const inputForm = document.getElementById('person-string');
    form.addEventListener('submit', e => {
        e.preventDefault();
        sendRequest('POST', './server.php', {
            string: inputForm.value
        })
    });
});
