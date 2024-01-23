import  { useState, useEffect } from "react";
import PropTypes from "prop-types";

export function ConditionalRenderAdvanced(props) {
    const [myUserRole, setMyUserRole] = useState("user");
    const [logged, setLogged] = useState(false);

    useEffect(() => {
        setMyUserRole(props.userRole);
        setLogged(props.isLoggedIn);
    }, [props.userRole, props.isLoggedIn]);

    let mensaje = "";

    if (!logged) {
        mensaje = "Inicia sesión";
    } else if (logged && myUserRole !== "admin") {
        mensaje = "Bienvenido usuario";
    } else if (logged && myUserRole === "admin") {
        mensaje = "Bienvenido admin";
    }

    return <p>{mensaje}</p>;
}

ConditionalRenderAdvanced.propTypes = {
    isLoggedIn: PropTypes.bool.isRequired,
    userRole: PropTypes.string.isRequired,
};
