function validateForm() {
  const errors = [];

  const fname = document.getElementById("fname").value.trim();
  const lname = document.getElementById("lname").value.trim();
  const birthdate = document.getElementById("birthdate").value;
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;
  const passwd2 = document.getElementById("passwd2").value;
  const consent = document.getElementById("consent").checked;

  if (!/^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{3,20}$/.test(fname)) {
    errors.push(
      "Imię musi mieć od 3 do 20 liter i nie może zawierać cyfr ani znaków specjalnych."
    );
  }

  if (!/^[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]{3,20}$/.test(lname)) {
    errors.push(
      "Nazwisko musi mieć od 3 do 20 liter i nie może zawierać cyfr ani znaków specjalnych."
    );
  }

  const birthDateObj = new Date(birthdate);
  const today = new Date();
  if (!birthdate || birthDateObj >= today) {
    errors.push("Data urodzenia musi być przeszła i w formacie dd-mm-yyyy.");
  }

  if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
    errors.push("Adres email jest nieprawidłowy.");
  }

  if (
    !/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/.test(
      password
    )
  ) {
    errors.push(
      "Hasło musi mieć 8-20 znaków, zawierać co najmniej jedną dużą literę, małą literę, cyfrę i znak specjalny."
    );
  }

  if (password !== passwd2) {
    errors.push("Hasła muszą być takie same.");
  }

  if (!consent) {
    errors.push("Musisz wyrazić zgodę na przetwarzanie danych osobowych.");
  }

  const errorContainer = document.getElementById("errorMessages");
  errorContainer.innerHTML = "";
  if (errors.length > 0) {
    errors.forEach((error) => {
      const errorElem = document.createElement("p");
      errorElem.style.color = "red";
      errorElem.textContent = error;
      errorContainer.appendChild(errorElem);
    });
    return false;
  }

  alert("Formularz został pomyślnie przesłany!");
  return true;
}

document
  .getElementById("userform")
  .addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault();
    }
  });
