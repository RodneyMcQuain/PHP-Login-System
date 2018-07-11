function validatePassword() {
  const password = document.getElementById("password");
  const passwordString = password.value;

  const isCharacterLength = characterLengthValidator(passwordString);
  const isLowercaseLetter = lowercaseLetterValidator(passwordString);
  const isUppercaseLetter = uppercaseLetterValidator(passwordString);
  const isNumber = numberValidator(passwordString);
  const isSymbol = symbolValidator(passwordString);

  if (isCharacterLength && isLowercaseLetter && isUppercaseLetter && isNumber && isSymbol) {
    return true;
  } else {
    alert("Please make sure your password follows the below criteria.");
    return false;
  }
}

const characterLengthValidator = (password) => {
  const characterLengthRegex = /^.{8,}$/;

  if (password.match(characterLengthRegex)) {
    return true;
  } else {
    return false;
  }
}

const lowercaseLetterValidator = (password) => {
  const lowercaseLetterRegex = /[a-z]/g;

  if (password.match(lowercaseLetterRegex)) {
    return true;
  } else {
    return false;
  }
}

const uppercaseLetterValidator = (password) => {
  const uppercaseLetterRegex = /[A-Z]/g;

  if (password.match(uppercaseLetterRegex)) {
    return true;
  } else {
    return false;
  }
}

const numberValidator = (password) => {
  const numberRegex = /[0-9]/g;

  if (password.match(numberRegex)) {
    return true;
  } else {
    return false;
  }
}

const symbolValidator = (password) => {
  const symbolRegex = /[/?/!@#/$%/^&*]/g;

  if (password.match(symbolRegex)) {
    return true;
  } else {
    return false;
  }
}
