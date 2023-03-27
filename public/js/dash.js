var problemToDept = {
    'Ac-Fridge-water cooler etc. not working ( Muni Hospital-Office Bldg)': 'electricity',
    'Any Ele. Problem in Swimminig Pool OR releated Pump,Motor Etc.': 'electricity',
    'Application done but not resolved-Property Tax': 'general',
    'Application Not Yet Approved - Swimming': 'general',
    'Applied For Entry But Still Not Approved - GYM': 'general',
    'Applied For The License But Not Yet Received': 'general',
    'Balvatika': 'general',
    'Basic Needs Like Water, Light and Fan Repairing - Library': 'electricity',
    'Cleaners Not Coming - SWM': 'cleaning',
    'Clearing off the Big Dead Animals': 'cleaning',
    'Clearing off the Dead Animals': 'cleaning',
    'Coach is Irregular/Remains Absent - Swimming': 'general',
    'Contaminated Water/Dirty Surroundings Causes Mosquito Reproduction': 'cleaning',
    'Deep Pit - Large settlement of road': 'repair',
    'Delay In Issuing The certificates -  - Birth/Death/Marriage Certificate': 'general',
    'Emptying The Dustbins': 'cleaning',
    'Footpath Repairing Required': 'repair',
    'Watering is Not Proper/Regular - Garden': 'water',
    'Waterlogged Due To Rain': 'water',
    'Water timing related': 'water'
};

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}