const birthday = new Date(2004, 9, 16);

function age(dateOfBirth) {
  const today = new Date();

  if (dateOfBirth.getFullYear() > today.getFullYear())
    return "your birthday can't be in the future";

  let age = today.getFullYear() - dateOfBirth.getFullYear();

  if (today.getMonth() < dateOfBirth.getMonth()) age--;
  else if (today.getMonth() === dateOfBirth.getMonth()) {
    age = today.getDate() < dateOfBirth.getDate() ? age - 1 : age;
  }

  return age;
}

console.log(age(birthday));
