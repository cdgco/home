setTimeout(console.log.bind(console, '%cSTOP!', 'color: RED;font-size: 70px;font-weight:bold;text-shadow: 1px 1px 5px grey;'), 0);
setTimeout(console.log.bind(console, '%cThis is a browser feature intended for developers. If you do not know what you are doing, do not continue.', 'color: dimgrey;font-size: 35px;font-weight:bold;'), 0);
        
 if (self == top) {
            if (window.innerHeight > 840 && window.innerHeight <= 920) {
                window.location = "s/90.php";
            }
            if (window.innerHeight > 750 && window.innerHeight <= 840) {
                window.location = "s/80.php";
            }
            if (window.innerHeight > 700 && window.innerHeight <= 750) {
                window.location = "s/75.php";
            }
            if (window.innerHeight > 620 && window.innerHeight <= 700) {
                window.location = "s/67.php";
            }
            if (window.innerHeight > 560 && window.innerHeight <= 620) {
                window.location = "s/60.php";
            }
            if (window.innerHeight <= 560 || window.outerWidth <= 1000) {
                window.location = "mobile/";
            }
        }

    function checkScale() {
        if (self == top) {
            if (window.innerHeight > 840 && window.innerHeight <= 920) {
                window.location = "s/90.php";
            }
            if (window.innerHeight > 750 && window.innerHeight <= 840) {
                window.location = "s/80.php";
            }
            if (window.innerHeight > 700 && window.innerHeight <= 750) {
                window.location = "s/75.php";
            }
            if (window.innerHeight > 620 && window.innerHeight <= 700) {
                window.location = "s/67.php";
            }
            if (window.innerHeight > 560 && window.innerHeight <= 620) {
                window.location = "s/60.php";
            }
            if (window.innerHeight <= 560 || window.outerWidth <= 1000) {
                window.location = "mobile/";
            }
        }
    }
    window.onresize = checkScale;

        var states = {
          'Alabama': 'AL',
          'Alaska': 'AK',
          'American Samoa': 'AS',
          'Arizona': 'AZ',
          'Arkansas': 'AR',
          'California': 'CA',
          'Colorado': 'CO',
          'Connecticut': 'CT',
          'Delaware': 'DE',
          'District Of Columbia': 'DC',
          'Federated States Of Micronesia': 'FM',
          'Florida': 'FL',
          'Georgia': 'GA',
          'Guam': 'GU',
          'Hawaii': 'HI',
          'Idaho': 'ID',
          'Illinois': 'IL',
          'Indiana': 'IN',
          'Iowa': 'IA',
          'Kansas': 'KS',
          'Kentucky': 'KY',
          'Louisiana': 'LA',
          'Maine': 'ME',
          'Marshall Islands': 'MH',
          'Maryland': 'MD',
          'Massachusetts': 'MA',
          'Michigan': 'MI',
          'Minnesota': 'MN',
          'Mississippi': 'MS',
          'Missouri': 'MO',
          'Montana': 'MT',
          'Nebraska': 'NE',
          'Nevada': 'NV',
          'New Hampshire': 'NH',
          'New Jersey': 'NJ',
          'New Mexico': 'NM',
          'New York': 'NY',
          'North Carolina': 'NC',
          'North Dakota': 'ND',
          'Northern Mariana Islands': 'MP',
          'Ohio': 'OH',
          'Oklahoma': 'OK',
          'Oregon': 'OR',
          'Palau': 'PW',
          'Pennsylvania': 'PA',
          'Puerto Rico': 'PR',
          'Rhode Island': 'RI',
          'South Carolina': 'SC',
          'South Dakota': 'SD',
          'Tennessee': 'TN',
          'Texas': 'TX',
          'Utah': 'UT',
          'Vermont': 'VT',
          'Virgin Islands': 'VI',
          'Virginia': 'VA',
          'Washington': 'WA',
          'West Virginia': 'WV',
          'Wisconsin': 'WI',
          'Wyoming': 'WY'
        }