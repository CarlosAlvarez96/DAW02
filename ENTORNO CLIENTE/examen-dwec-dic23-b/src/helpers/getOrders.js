export async function getOrders(URL) {
    try {
        const response = await fetch(URL);

        if (!response.ok) {
            throw new Error("No se obtuvo las orders");
        }

        const data = await response.json();
        
        // Verifica si 'data' es un array válido y no está vacío
        if (Array.isArray(data) && data.length > 0) {
            const formattedData = data.reduce((result, order) => {
                // Verifica si el objeto tiene las propiedades esperadas
                if (order && order.strCategory && order.price) {
                    // Añade la categoría y el precio al objeto resultante
                    result[order.strCategory] = order.price;
                } else {
                    console.error("La estructura del objeto no es la esperada");
                }

                return result;
            }, {});

            console.log(formattedData);
            return formattedData;
        } else {
            console.error("La respuesta no es un array válido o está vacío");
            return null;
        }
    } catch (error) {
        console.error("Error: ", error);
        throw error;
    }
}
