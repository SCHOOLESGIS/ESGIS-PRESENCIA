import dayjs from 'dayjs';

export function usefiliere () {
    const cookie = useCookie("auth")
    const data = useState("filieresData", () => [])
    const links = useState("filiereLinks", () => [])
    const onefiliere = useState("filiereData", () => [])
    const filiereEnum = "filiere"


    async function getAllfilieres (page) {
        data.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/filieres?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        console.log(response);
        response.data.forEach(element => {
            const filiere = {
                filiere_id: "",
                filiere_name: "",
                filiere_code: "",
                createdAt: ""
            }
            filiere.filiere_id = element.filiere_id
            filiere.filiere_name = element.filiere_name + " " + element.filiere_name
            filiere.filiere_code = element.filiere_code
            filiere.hoursAssigned = element.filiere_id
            filiere.createdAt = element.created_at

            if (data.value.length < 10) {
                data.value.push(filiere)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    async function getfiliere (filiereId) {
        const filiere = {
            filiere_id: "",
            filiere_name: "",
            filiere_code: "",
            description: "",
            createdAt: "",
            filiere: {
                filiere_name: "",
                filiere_level: "",
            },
            cours: []
        }

        const response = await $fetch(`http://localhost:8000/api/v1/filieres/${filiereId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        filiere.filiere_id = response.filiere_id
        filiere.filiere_name = response.filiere_name
        filiere.filiere_code = response.filiere_code
        filiere.description = response.description
        filiere.createdAt = response.createdAt
        filiere.filiere.filiere_name = response.filiere.filiere_name,
        filiere.filiere.filiere_level = response.filiere.filiere_level,
        // console.log(response.cours[0]);
        response.cours.forEach(cour => {
            filiere.cours.push(cour)
        })

        onefiliere.value = []
        onefiliere.value.push(filiere)
    }

    async function updatefiliere (filiereData, filiereId) {

        await getfiliere(filiereId);

        const filiereFound = filiere.value[0];
        console.log("filiere ", filiereFound)
        if (!filiereFound) {
            console.error("filiere non trouvé");
            return;
        }

        const responseA = await $fetch(`http://localhost:8000/api/v1/filieres/${filiereFound.user_id}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                name: filiereData.name,
                surname: filiereData.surname,
                email: filiereData.email,
            }
        })

        getAllfilieres(1)
        return navigateTo('/admin/filieres/filieres-liste')
    }

    async function createfiliere (filiereData) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/filieres`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                name: filiereData.name,
                surname: filiereData.surname,
                email: filiereData.email,
                password: filiereData.password,
                password_confirmation: filiereData.password_confirmation,
                role: filiereEnum,
                specialite: filiereData.specialite,
            }
        })

        getAllfilieres(1)
        return navigateTo('/admin/filieres/filieres-liste')
    }

    async function deletefiliere (filiereId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/filieres/${filiereId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        getAllfilieres(1)
    }

    return {
        getAllfilieres,
        getfiliere,
        updatefiliere,
        createfiliere,
        deletefiliere
    }
}