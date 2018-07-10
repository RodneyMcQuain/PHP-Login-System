window.onload = function() {
  const password = document.getElementById("password");
  const charactetLength = document.getElementById("characterLength");
  const lowercaseLetter = document.getElementById("lowercaseLetter");
  const uppercaseLetter = document.getElementById("uppercaseLetter");
  const number = document.getElementById("number");
  const symbol = document.getElementById("symbol");

  const characterLengthValidator = (password) => {
    const characterLengthRegex = /^.{8,}$/;

    if (password.match(characterLengthRegex)) {
      characterLength.classList.remove("invalid")
      characterLength.classList.add("valid")
    } else {
      characterLength.classList.remove("valid")
      characterLength.classList.add("invalid")
    }
  }

  const lowercaseLetterValidator = (password) => {
    const lowercaseLetterRegex = /[a-z]/g;

    if (password.match(lowercaseLetterRegex)) {
      lowercaseLetter.classList.remove("invalid")
      lowercaseLetter.classList.add("valid")
    } else {
      lowercaseLetter.classList.remove("valid")
      lowercaseLetter.classList.add("invalid")
    }
  }

  const uppercaseLetterValidator = (password) => {
    const uppercaseLetterRegex = /[A-Z]/g;

    if (password.match(uppercaseLetterRegex)) {
      uppercaseLetter.classList.remove("invalid")
      uppercaseLetter.classList.add("valid")
    } else {
      uppercaseLetter.classList.remove("valid")
      uppercaseLetter.classList.add("invalid")
    }
  }

  const numberValidator = (password) => {
    const numberRegex = /[0-9]/g;

    if (password.match(numberRegex)) {
      number.classList.remove("invalid")
      number.classList.add("valid")
    } else {
      number.classList.remove("valid")
      number.classList.add("invalid")
    }
  }

  const symbolValidator = (password) => {
    const symbolRegex = /[/?/!@#/$%/^&*]/g;

    if (password.match(symbolRegex)) {
      symbol.classList.remove("invalid")
      symbol.classList.add("valid")
    } else {
      symbol.classList.remove("valid")
      symbol.classList.add("invalid")
    }
  }

  password.addEventListener("keyup", e => {
    const passwordString = password.value;

    characterLengthValidator(passwordString);
    lowercaseLetterValidator(passwordString);
    uppercaseLetterValidator(passwordString);
    numberValidator(passwordString);
    symbolValidator(passwordString);
  })
}
