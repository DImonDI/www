// Преобразование изображения в текст
function imageToText() {
    // Получаем изображение
    const image = document.getElementById('image').files[0];
  
    // Создаем объект FormData для отправки данных на сервер
    const formData = new FormData();
    formData.append('image', image);
  
    // Отправляем запрос на сервер для распознавания текста
    fetch('/recognize-text', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(text => {
      // Выводим распознанный текст
      document.getElementById('text').value = text;
    })
    .catch(error => {
      console.error('Ошибка:', error);
    });
  }
  
  // Преобразование текста в изображение
  function textToImage() {
    // Получаем текст
    const text = document.getElementById('text').value;
  
    // Создаем объект FormData для отправки данных на сервер
    const formData = new FormData();
    formData.append('text', text);
  
    // Отправляем запрос на сервер для преобразования текста в изображение
    fetch('/generate-image', {
      method: 'POST',
      body: formData
    })
    .then(response => response.blob())
    .then(blob => {
      // Создаем URL для изображения
      const imageUrl = URL.createObjectURL(blob);
  
      // Выводим изображение на страницу
      const image = document.getElementById('image-preview');
      image.src = imageUrl;
    })
    .catch(error => {
      console.error('Ошибка:', error);
    });
  }