// En ConditionalRender.jsx
import PropTypes from 'prop-types';

export function ConditionalRender({ condition }){
    let mensaje = "";
    condition ? 
        mensaje = "Condición verdadera"
        :
        mensaje = "Condición falsa";

    return <p>{mensaje}</p>;
}

ConditionalRender.propTypes = {
    condition: PropTypes.bool.isRequired
};

