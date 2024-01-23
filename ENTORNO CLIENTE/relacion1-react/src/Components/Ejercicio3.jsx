export function Ejercicio3() {
    function pulsarBoton() {
        console.log("botón pulsado");
    }
    //Ejercicio 5
    const estiloBoton = {
        borderRadius: "999px",
        padding: "10px 20px",
        margin: "10px",
        backgroundColor: "blue",
        color: "white",
        cursor: "pointer",
    };

    return (
        <button style={estiloBoton} onClick={pulsarBoton}>
            Ejercicio 3
        </button>
    );
}
