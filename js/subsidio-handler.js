document.addEventListener("DOMContentLoaded", function () {
  fetch("https://restcountries.com/v3.1/all")
    .then((response) => response.json())
    .then((data) => {
      const nacionalidadSelect = document.getElementById("nacionalidad");
      const paisNacimientoSelect = document.getElementById("paisNacimiento");
      const nacionalidades = {
        Afghan: "Afgana",
        Albanian: "Albanesa",
        Algerian: "Algeriana",
        American: "Estadounidense",
        Andorran: "Andorrana",
        Angolan: "Angoleña",
        Argentine: "Argentina",
        Armenian: "Armenia",
        Australian: "Australiana",
        Austrian: "Austriaca",
        Azerbaijani: "Azerbaiyana",
        Bahamian: "Bahameña",
        Bahraini: "Bareiní",
        Bangladeshi: "Bangladesí",
        Barbadian: "Barbadense",
        Belarusian: "Bielorrusa",
        Belgian: "Belga",
        Belizean: "Beliceña",
        Beninese: "Beninesa",
        Bhutanese: "Butanesa",
        Bolivian: "Boliviana",
        Bosnian: "Bosnia",
        Botswanan: "Botsuana",
        Brazilian: "Brasileña",
        British: "Británica",
        Bruneian: "Bruneana",
        Bulgarian: "Búlgara",
        Burkinabe: "Burkinesa",
        Burmese: "Birmana",
        Burundian: "Burundesa",
        Cambodian: "Camboyana",
        Cameroonian: "Camerunesa",
        Canadian: "Canadiense",
        "Cape Verdean": "Caboverdiana",
        "Central African": "Centroafricana",
        Chadian: "Chadiana",
        Chilean: "Chilena",
        Chinese: "China",
        Colombian: "Colombiana",
        Comoran: "Comorense",
        Congolese: "Congoleña",
        "Costa Rican": "Costarricense",
        Croatian: "Croata",
        Cuban: "Cubana",
        Cypriot: "Chipriota",
        Czech: "Checa",
        Danish: "Danesa",
        Djiboutian: "Yibutiana",
        Dominican: "Dominicana",
        Dutch: "Neerlandesa",
        "East Timorese": "Timorense",
        Ecuadorean: "Ecuatoriana",
        Egyptian: "Egipcia",
        Emirati: "Emiratí",
        "Equatorial Guinean": "Ecuatoguineana",
        Eritrean: "Eritrea",
        Estonian: "Estonia",
        Ethiopian: "Etíope",
        Fijian: "Fiyiana",
        Finnish: "Finlandesa",
        French: "Francesa",
        Gabonese: "Gabonesa",
        Gambian: "Gambiana",
        Georgian: "Georgiana",
        German: "Alemana",
        Ghanaian: "Ghanesa",
        Greek: "Griega",
        Grenadian: "Granadina",
        Guatemalan: "Guatemalteca",
        "Guinea-Bissauan": "Guineana",
        Guinean: "Guineana",
        Guyanese: "Guyanesa",
        Haitian: "Haitiana",
        Honduran: "Hondureña",
        Hungarian: "Húngara",
        Icelandic: "Islandesa",
        Indian: "India",
        Indonesian: "Indonesia",
        Iranian: "Iraní",
        Iraqi: "Iraquí",
        Irish: "Irlandesa",
        Israeli: "Israelí",
        Italian: "Italiana",
        Ivorian: "Marfileña",
        Jamaican: "Jamaicana",
        Japanese: "Japonesa",
        Jordanian: "Jordana",
        Kazakh: "Kazaja",
        Kenyan: "Keniana",
        "Kittitian and Nevisian": "Sancristobaleña",
        Kuwaiti: "Kuwaití",
        Kyrgyz: "Kirguisa",
        Laotian: "Laosiana",
        Latvian: "Letona",
        Lebanese: "Libanesa",
        Liberian: "Liberiana",
        Libyan: "Libia",
        Liechtenstein: "Liechtensteiniana",
        Lithuanian: "Lituana",
        Luxembourgish: "Luxemburguesa",
        Macedonian: "Macedonia",
        Malagasy: "Malgache",
        Malawian: "Malauí",
        Malaysian: "Malaya",
        Maldivian: "Maldiva",
        Malian: "Maliense",
        Maltese: "Maltesa",
        Marshallese: "Marshalés",
        Mauritanian: "Mauritana",
        Mauritian: "Mauriciana",
        Mexican: "Mexicana",
        Micronesian: "Micronesia",
        Moldovan: "Moldava",
        Monacan: "Monegasca",
        Mongolian: "Mongola",
        Moroccan: "Marroquí",
        Mozambican: "Mozambiqueña",
        Namibian: "Namibia",
        Nauruan: "Nauruana",
        Nepalese: "Nepalí",
        "New Zealander": "Neozelandesa",
        Nicaraguan: "Nicaragüense",
        Nigerian: "Nigeriana",
        Nigerien: "Nigerina",
        "North Korean": "Norcoreana",
        Norwegian: "Noruega",
        Omani: "Omaní",
        Pakistani: "Paquistaní",
        Palauan: "Palauana",
        Palestinian: "Palestina",
        Panamanian: "Panameña",
        "Papua New Guinean": "Papú",
        Paraguayan: "Paraguaya",
        Peruvian: "Peruana",
        Polish: "Polaca",
        Portuguese: "Portuguesa",
        Qatari: "Catarí",
        Romanian: "Rumana",
        Russian: "Rusa",
        Rwandan: "Ruandesa",
        "Saint Lucian": "Santa Lucía",
        Salvadoran: "Salvadoreña",
        Samoan: "Samoana",
        "San Marinese": "Sanmarinense",
        "Sao Tomean": "Santotomense",
        Saudi: "Saudí",
        Senegalese: "Senegalesa",
        Serbian: "Serbia",
        Seychellois: "Seychellense",
        "Sierra Leonean": "Sierraleonesa",
        Singaporean: "Singapurense",
        Slovak: "Eslovaca",
        Slovenian: "Eslovena",
        "Solomon Islander": "Salomonense",
        Somali: "Somalí",
        "South African": "Sudafricana",
        "South Korean": "Surcoreana",
        "South Sudanese": "Sur Sudanesa",
        Spanish: "Española",
        "Sri Lankan": "Ceilanesa",
        Sudanese: "Sudanesa",
        Surinamer: "Surinamesa",
        Swazi: "Suazi",
        Swedish: "Sueca",
        Swiss: "Suiza",
        Syrian: "Siria",
        Taiwanese: "Taiwanesa",
        Tajik: "Tayika",
        Tanzanian: "Tanzana",
        Thai: "Tailandesa",
        Togolese: "Togolesa",
        Tongan: "Tongana",
        "Trinidadian or Tobagonian": "Trinitense",
        Tunisian: "Tunecina",
        Turkish: "Turca",
        Turkmen: "Turcomana",
        Tuvaluan: "Tuvaluana",
        Ugandan: "Ugandesa",
        Ukrainian: "Ucraniana",
        Uruguayan: "Uruguaya",
        Uzbek: "Uzbeka",
        Vanuatuan: "Vanuatuense",
        Venezuelan: "Venezolana",
        Vietnamese: "Vietnamita",
        Yemeni: "Yemení",
        Zambian: "Zambiana",
        Zimbabwean: "Zimbabuense",
      };

      const sortedNacionalidades = Object.values(nacionalidades).sort();

      sortedNacionalidades.forEach((nacionalidad) => {
        const option = document.createElement("option");
        option.value = nacionalidad;
        option.textContent = nacionalidad;
        nacionalidadSelect.appendChild(option);
      });

      const sortedCountries = data
        .map((country) => country.translations.spa.common)
        .sort();

      sortedCountries.forEach((country) => {
        const option = document.createElement("option");
        option.value = country;
        option.textContent = country;
        paisNacimientoSelect.appendChild(option);
      });
    })
    .catch((error) =>
      console.error("Error al obtener las nacionalidades:", error)
    );
});

document
  .getElementById("subsidioForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);

    // Formatear la fecha en dd/mm/yyyy
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); // Enero es 0
    var yyyy = today.getFullYear();
    var formattedDate = dd + "/" + mm + "/" + yyyy;

    formData.set("fechaSolicitud", formattedDate);

    fetch("send_subsidio.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        document.getElementById("message").innerHTML =
          '<div class="alert alert-success">Correo enviado exitosamente.</div>';
        document.getElementById("subsidioForm").reset();
        document
          .getElementById("message")
          .scrollIntoView({ behavior: "smooth" });
      })
      .catch((error) => {
        document.getElementById("message").innerHTML =
          '<div class="alert alert-danger">Error al enviar el correo.</div>';
        document
          .getElementById("message")
          .scrollIntoView({ behavior: "smooth" });
      });
  });

document.getElementById("rut").addEventListener("input", function (event) {
  var value = event.target.value.replace(/\D/g, ""); // Elimina todos los caracteres que no sean dígitos
  if (value.length > 1) {
    value = value.replace(/^(\d{1,2})(\d{3})(\d{3})([\dkK])$/, "$1.$2.$3-$4");
  } else if (value.length > 0) {
    value = value.replace(/^(\d{1,2})(\d{3})(\d{3})$/, "$1.$2.$3");
  }
  event.target.value = value;
});

document.getElementById("telefono").addEventListener("input", function (event) {
  var value = event.target.value.replace(/\D/g, ""); // Elimina todos los caracteres que no sean dígitos
  if (value.startsWith("569")) {
    value = value.slice(3); // Elimina el prefijo 569 si ya está presente
  }
  if (value.length > 8) {
    value = value.slice(0, 8); // Limita a 8 dígitos
  }
  event.target.value = "+569 " + value.replace(/(\d{4})(\d{4})/, "$1 $2");
});

document.getElementById("telefono").addEventListener("focus", function (event) {
  if (event.target.value === "") {
    event.target.value = "+569 ";
  }
});
