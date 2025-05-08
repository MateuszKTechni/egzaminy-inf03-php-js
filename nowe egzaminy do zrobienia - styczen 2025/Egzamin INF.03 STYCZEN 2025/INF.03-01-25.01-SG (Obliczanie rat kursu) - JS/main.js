function oblicz() {
    //sprawdzam zaznaczenie ktory kurs jest wybrany
    const kursReact = document.getElementById("React").checked;
    const kursJS = document.getElementById("JavaScript").checked;

    //pobierma dane 
    const iloscRat = parseInt(document.getElementById("raty").value);
    const miasto = document.getElementById("miasta").value;
    const wynik = document.getElementById("wynik");

    const cenaKursReact = 5000;
    const cenaKursJavaScript = 3000;

    // Obliczenie całkowitej ceny
    let cenaCalkowita = 0;
    if (kursReact) cenaCalkowita += cenaKursReact;
    if (kursJS) cenaCalkowita += cenaKursJavaScript;

    // Obliczenie jednej raty
    let jednaRata = 0;

    if (iloscRat > 0) {
        jednaRata = (cenaCalkowita / iloscRat);
    }

    wynik.innerHTML = `Kurs odbędzie się w ${miasto}. Koszt całkowity: ${cenaCalkowita} zł. Płacisz ${iloscRat} rat po ${jednaRata} zł.`;
}