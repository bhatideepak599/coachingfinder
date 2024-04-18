var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA=='
}


var countrySelect = document.querySelector('.country'),
    stateSelect = document.querySelector('.state'),
    citySelect = document.querySelector('.city')

// Array to store selected values

function loadCountries() {

    let apiEndPoint = config.cUrl

    fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(Response => Response.json())
    .then(data => {
        console.log(data);

        data.forEach(country => {
            const option = document.createElement('option')
            option.value = country.iso2
            option.textContent = country.name 
            if(country.name=="India"){
                countrySelect.appendChild(option)
            }
            
        })
    })
    .catch(error => console.error('Error loading countries:', error))

    stateSelect.disabled = true
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'none'
    citySelect.style.pointerEvents = 'none'
}


function loadStates() {
    stateSelect.disabled = false
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'auto'
    citySelect.style.pointerEvents = 'none'

    const selectedCountryCode = countrySelect.value
    // console.log(selectedCountryCode);
    stateSelect.innerHTML = '<option value="">Select State</option>' // for clearing the existing states
    citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

    fetch(`${config.cUrl}/${selectedCountryCode}/states`, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        // console.log(data);

        data.forEach(state => {
            const option = document.createElement('option')
            option.value = state.iso2
            option.textContent = state.name 
            stateSelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading countries:', error))
}


function loadCities() {
    citySelect.disabled = false
    citySelect.style.pointerEvents = 'auto'

    const selectedCountryCode = countrySelect.value
    const selectedStateCode = stateSelect.value
     console.log(selectedCountryCode, selectedStateCode);

    citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

    fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        console.log(data);

        data.forEach(city => {
            const option = document.createElement('option')
            option.value = city.iso2
            option.textContent = city.name 
            citySelect.appendChild(option)
        })
    })
     // Store selected values in the array
    //  console.log(citySelect.options[citySelect.selectedIndex].text)

     const selectedCountry = countrySelect.options[countrySelect.selectedIndex].text;
     const selectedState = stateSelect.options[stateSelect.selectedIndex].text;
     const selectedCity = citySelect.options[citySelect.selectedIndex].text;
 
     
 
     // Display selected values
    //  document.getElementById('selectedValues').innerHTML = `Selected Country: ${selectedValues[0]}, Selected State: ${selectedValues[1]}, Selected City: ${selectedValues[2]}`;
}

function send_data(selectedValues){

   window.location.href = "show_coaching_small.php?fetchedData=" + encodeURIComponent(JSON.stringify(selectedValues)); 
}


function performSearch() {
    // You can perform your search logic here using the selectedValues array
    const selectedCountry = countrySelect.options[countrySelect.selectedIndex].text;
    const selectedState = stateSelect.options[stateSelect.selectedIndex].text;
    const selectedCity = citySelect.options[citySelect.selectedIndex].text;
    selectedValues = [selectedCountry, selectedState, selectedCity];
    var lengthOfSelectedValues = selectedValues.length;
    if(  selectedCountry !='Select Country' && selectedState!='Select State' && selectedCity!='Select City' && lengthOfSelectedValues==3){
        if((selectedCountry !='Select Country' && selectedState!='Select State' && selectedCity!='Select City')&&($('#coachingName').val()!="")){
            alert("Please select either location or coaching name at a single time");
            // exist(0);
            return;  
        }

        send_data(selectedValues);
        var additionalData = 0;

        var url = "show_coaching_small.php?fetchedData=" + encodeURIComponent(JSON.stringify(selectedValues)) + "&additionalData=" + encodeURIComponent(additionalData);
        
        window.location.href = url;

        alert(json_coachingName); 
        // console.log("Selected Country:", selectedCountry);
        // console.log("Selected State:", selectedState);
        // console.log("Selected City:", selectedCity);
        // console.log("Performing search:", selectedValues);


    }else if( $('#coachingName').val()!=""){
       var coachingName=$('#coachingName').val();
       var additionalData = 1;

       var url = "show_coaching_small.php?fetchedData2=" + encodeURIComponent(JSON.stringify(coachingName)) + "&additionalData=" + encodeURIComponent(additionalData);
       
       window.location.href = url;
       alert(json_coachingName); 
      
   }
     else{
        alert("Please Select at least one field");
    }
    
}

window.onload = loadCountries

$(document).ready(function(){

    $('#coachingName').keyup(function(){
        var data=$(this).val();
        if(data!=''){
             $.ajax({
                url:"search.php",
                method:"POST",
                data:{data:data},
                success:function(data){
                 $('#coachingList').fadeIn();
                 $('#coachingList').html(data);
                }
             });
        }else{
            $('#coachingList').fadeOut();
            $('#coachingList').html("");
        }
    });
   $(document).on('click','li',function(){
   $('#coachingName').val($(this).text());
   $('#coachingList').fadeOut();
   });
});

//   auto typing
//  const textToType = "Hello,";
 const typingSpeed = 50; // in milliseconds

 const autoTypingText = document.getElementById("auto-typing-text");

 function typeText() {
   let currentText = "";
   let index = 0;

   function type() {
     currentText = textToType.slice(0, index);
     autoTypingText.textContent = currentText;
     index++;

     if (index <= textToType.length) {
       setTimeout(type, typingSpeed);
     }
   }

   type();
 }

