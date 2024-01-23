import PropTypes from 'prop-types';

export function CustomButton (props){

    return (
        <button onClick={props.onClick} className={`bg-${props.color}`}>
            {props.texto}
        </button>
    );
}

CustomButton.propTypes = {
    color: PropTypes.string.isRequired,  // Espera que 'color' sea una cadena y es obligatorio
    texto: PropTypes.string.isRequired,  // Espera que 'texto' sea una cadena y es obligatorio
    onClick: PropTypes.func.isRequired    // Espera que 'onClick' sea una función y es obligatorio
};

