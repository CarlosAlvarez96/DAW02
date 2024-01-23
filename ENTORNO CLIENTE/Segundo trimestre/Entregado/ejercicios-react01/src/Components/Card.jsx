import PropTypes from 'prop-types';
// Acepta props: title, body, footer.
export function Card(props)  {
    return (
        <div style={{ border: "1px solid white",
                      "borderRadius": "5px" }}>
            <h1 style={{padding: 0, margin:0, "borderBottom":"1px solid white"}}>{props.title}</h1>
            <article style={{padding: "10px", margin:"10px" }}>{props.body}</article>
            <footer style={{"borderTop":"1px solid white"}}>{props.footer}</footer>
        </div>
    )
}

Card.propTypes = {
    title: PropTypes.string.isRequired,
    body: PropTypes.string.isRequired,
    footer: PropTypes.string.isRequired
};
