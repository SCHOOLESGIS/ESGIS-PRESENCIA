export function useTeacher () {
    const data = useState("enseignantData", () => [])
    const links = useState("enseignantLinks", () => [])

    async function getAllTeachers () {
        const response = await $fetch('http://localhost:8000/api/v1/enseignants', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        console.log(response);
        response.data.forEach(element => {
            const enseignant = {
                enseignant_id: "",
                name: "",
                email: "",
                hoursAssigned: "",
                hoursAbsent: "",
                createdAt: ""
            }
            enseignant.enseignant_id = element.enseignant_id
            enseignant.name = element.user.name + " " + element.user.surname
            enseignant.email = element.user.email
            enseignant.hoursAssigned = element.enseignant_id
            enseignant.hoursAbsent = element.enseignant_id
            enseignant.createdAt = element.created_at

            if (data.value.length === 0) {
                data.value.push(enseignant)
            }
        });

        links.value.push(response.total)
        links.value.push(response.per_page)

    }

    async function getTeacher (teacherId) {
        const response = await $fetch(`http://localhost:8000/api/v1/enseignants/${teacherId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        response.data.forEach(element => {
            const enseignant = {
                enseignant_id: "",
                name: "",
                email: "",
                hoursAssigned: "",
                hoursAbsent: "",
                createdAt: ""
            }
            enseignant.enseignant_id = element.enseignant_id
            enseignant.name = element.user.name + " " + element.user.surname
            enseignant.email = element.user.email
            enseignant.hoursAssigned = element.enseignant_id
            enseignant.hoursAbsent = element.enseignant_id
            enseignant.createdAt = element.created_at

            if (data.value) {
                data.value.push(enseignant)
            }
        });

        links.value.push(response.total)
        links.value.push(response.per_page)

    }

    return {
        getAllTeachers
    }
}