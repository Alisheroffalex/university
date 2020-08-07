ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
            center: [41.340865074135735,69.2868065],
            zoom: 17
        }, {
            searchControlProvider: 'yandex#search'
        }),

    // Создаем геообъект с типом геометрии "Точка".
        myGeoObject = new ymaps.GeoObject({
            // Описание геометрии.
            geometry: {
                type: "Point",
                coordinates: [41.340865074135735,69.2868065]
            }
        }, {
            // Опции.
            // Иконка метки будет растягиваться под размер ее содержимого.
            preset: 'islands#redIcon',
            // Метку можно перемещать.
            draggable: true
        }),
        myPieChart = new ymaps.Placemark([
            41.340865074135735,69.2868065
        ]);

    myMap.geoObjects
        .add(myGeoObject)
        .add(myPieChart)
}
