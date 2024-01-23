import PropTypes from 'prop-types';

export function Ejercicio2({ nombres }) {
    const listaItems = nombres.map((n, index) => (
        <li key={index}>{n}</li>
    ));

    return (
        <div>
            <p>Lista de nombres</p>
            <ul>{listaItems}</ul>
        </div>
    );
}

Ejercicio2.propTypes = {
    nombres: PropTypes.arrayOf(PropTypes.string).isRequired,
};
