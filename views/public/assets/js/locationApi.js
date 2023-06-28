// Fetch all countries from geonames.org API
$(document).ready(function() {
    // Fetch access token
    $.ajax({
      url: 'https://www.universal-tutorial.com/api/getaccesstoken',
      method: 'GET',
      headers: {
        'Accept': 'application/json',
        'api-token': '699g2R-uk0MDbyPmpAxsxlycaLBoyravv6sAtX31FGXxenq5sIsdhZZJ6cFy2V5hEU8',
        'user-email': 'elijahndibe@gmail.com'
      },
      success: function(data) {
        const accessToken = data.auth_token;

        // Fetch countries
        $.ajax({
          url: 'https://www.universal-tutorial.com/api/countries/',
          method: 'GET',
          headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${accessToken}`
          },
          success: function(data) {
            const countrySelect = $('#country');

            data.forEach(function(country) {
              const option = $('<option></option>')
                .text(country.country_name)
                .val(country.country_name);
              countrySelect.append(option);
            });
          },
          error: function(error) {
            console.error('Error fetching countries:', error);
          }
        });

        // Country select change event
        $('#country').on('change', function() {
          const selectedCountry = $(this).val();

          // Fetch states
          $.ajax({
            url: 'https://www.universal-tutorial.com/api/states/' + selectedCountry,
            method: 'GET',
            headers: {
              'Accept': 'application/json',
              'Authorization': `Bearer ${accessToken}`
            },
            success: function(data) {
              const stateSelect = $('#state');

              stateSelect.empty(); // Clear previous options

              data.forEach(function(state) {
                const option = $('<option></option>')
                  .text(state.state_name)
                  .val(state.state_name);
                stateSelect.append(option);
              });

              stateSelect.prop('disabled', false); // Enable state select
            },
            error: function(error) {
              console.error('Error fetching states:', error);
            }
          });
        });

        // State select change event
        $('#state').on('change', function() {
          const selectedState = $(this).val();

          // Fetch cities
          $.ajax({
            url: 'https://www.universal-tutorial.com/api/cities/' + selectedState,
            method: 'GET',
            headers: {
              'Accept': 'application/json',
              'Authorization': `Bearer ${accessToken}`
            },
            success: function(data) {
              const citySelect = $('#city');

              citySelect.empty(); // Clear previous options

              data.forEach(function(city) {
                const option = $('<option></option>')
                  .text(city.city_name)
                  .val(city.city_name);
                citySelect.append(option);
              });

              citySelect.prop('disabled', false); // Enable city select
            },
            error: function(error) {
              console.error('Error fetching cities:', error);
            }
          });
        });
      },
      error: function(error) {
        console.error('Error fetching access token:', error);
      }
    });

    // Other form submission or validation logic goes here
  });