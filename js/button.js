var count = 0;
document.getElementById("myButton").onclick = function() {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML ="";
    } else {
        // Создаем новый элемент img
        var img = document.createElement("img");
        // Устанавливаем источник изображения
        img.src ="https://animals.pibig.info/uploads/posts/2023-10/1696535994_animals-pibig-info-p-zabavnie-kapibari-pinterest-67.jpg";
        // Добавляем изображение в параграф
        document.getElementById("demo").appendChild(img);
    }
}