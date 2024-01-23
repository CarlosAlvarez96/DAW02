import PropTypes from 'prop-types';
export function UserList({ list }) {
    return (
        <div>
            <ol>
                {list.map((item, index) => (
                        <li key={item.id}>
                            <a href={`#user-${index}`}>{index + 1}</a> - {item.nombre}
                        </li>
                ))}
            </ol>
        </div>
    );
}
UserList.propTypes = {
    list: PropTypes.array.isRequired,
}
