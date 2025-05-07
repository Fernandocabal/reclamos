const formgetuser = document.getElementById("formgetuser");

formgetuser.addEventListener("submit", async (e) => {
    e.preventDefault();

    const codigo_usuario = document.getElementById("codigo_usuario").value;
    const url = `https://apireclamos.ferchudev.com.py/api-rest/get_user.php?code=${codigo_usuario}`;

    try {
        const response = await fetch(url); // No se envía encabezado Content-Type en GET
        const data = await response.json();

        if (data.success) {
            const user = data.resultado;
            console.log("Usuario encontrado:", user.nombre);
            document.getElementById("name_user").value = `${user.nombre} ${user.apellido}`;
            document.getElementById("direccion").value = user.direccion;
        } else {
            console.error("Error en la respuesta:", data);
        }
    } catch (error) {
        console.error("Error de red o servidor:", error);
    }
});
