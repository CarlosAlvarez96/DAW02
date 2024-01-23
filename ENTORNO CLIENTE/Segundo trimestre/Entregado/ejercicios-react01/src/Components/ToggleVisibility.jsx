import{ useState } from 'react';

export function ToggleVisibility() {
    const [visible, setVisible] = useState(false);

    const mostrarOcultar = () => {
        setVisible(!visible);
    };

    return (
        <div>
            {visible && <p>Mensaje</p>}
            <button onClick={mostrarOcultar}>Mostrar/Ocultar</button>
        </div>
    );
}

