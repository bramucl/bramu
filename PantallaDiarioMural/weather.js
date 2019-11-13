window.addEventListener('load', ()=>{
    let long;
    let lat;
    let temperatureDescription = document.querySelector(".description");
    let temperatureDegree = document.querySelector(".temperature-degree");
    let locationTimezone = document.querySelector(".location-timezone");

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(position => {
            long = position.coords.longitude;
            lat = position.coords.latitude;
            const proxy = 'https://cors-anywhere.herokuapp.com/';
            //const api = ''+ proxy +'https://api.darksky.net/forecast/32ae8e4ca0a0b17b2fe7e3ff86317454/'+ lat +',' + long +'';
            const api = ''+ proxy +'https://api.darksky.net/forecast/32ae8e4ca0a0b17b2fe7e3ff86317454/-34.98279,-71.23943';
            
            fetch(api)
            .then(response =>{
                return response.json();
            })
            .then(data =>{
                console.log(data);
                const {temperature, icon }= data.currently;
                
                //Formula F a Celsius
                let celsius = (temperature - 32) * (5/9);
                //Elementos de API
                temperatureDegree.textContent = Math.floor(celsius);
                
                
                
                //Enviar Icon
                setIcons(icon, document.querySelector(".icon"));
                                          

            });
        });
        
    }

    function setIcons(icon, iconID){
        const skycons = new Skycons({ color: "white" });
        const currentIcon = icon.replace(/-/g, "_").toUpperCase();
        skycons.play();
        return skycons.set(iconID, Skycons[currentIcon]);
    }
});