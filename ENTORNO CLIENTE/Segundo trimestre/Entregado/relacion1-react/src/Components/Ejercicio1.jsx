import PropTypes from 'prop-types';


export function Ejercicio1({ isLoggedIn }) {
    const mensaje = isLoggedIn ? "Bienvenido" : "Por favor, inicia sesión"

    return (<p>{mensaje}</p>)
}

Ejercicio1.propTypes = {
    isLoggedIn: PropTypes.bool.isRequired,
  };