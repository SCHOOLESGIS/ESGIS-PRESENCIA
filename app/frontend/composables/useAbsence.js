import dayjs from 'dayjs';

export function useAbsence () {
    const cookie = useCookie("auth")
    const data = useState("absencesData", () => [])
    const links = useState("absenceLinks", () => [])
    const absence = useState("absenceData", () => [])
    const absenceEnum = "absence"


    async function getAllAbsences (page) {
        data.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/absences?page=${page}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`
            }
        })

        console.log(response);
        response.data.forEach(element => {
            const absence = {
                absence_id: "",
                name: "",
                email: "",
                hoursAssigned: "",
                hoursAbsent: "",
                createdAt: ""
            }
            absence.absence_id = element.absence_id
            absence.name = element.user.name + " " + element.user.surname
            absence.email = element.user.email
            absence.hoursAssigned = element.absence_id
            absence.hoursAbsent = element.absence_id
            absence.createdAt = element.created_at

            if (data.value.length < 10) {
                data.value.push(absence)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    async function getAbsence (absenceId) {
        const absence = {
            user_id: "",
            absence_id: "",
            name: "",
            surname: "",
            email: "",
            createdAt: "",
            modules: []
        }

        const response = await $fetch(`http://localhost:8000/api/v1/absences/${absenceId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        absence.user_id = response.user_id
        absence.absence_id = response.absence_id
        absence.name = response.user.name
        absence.surname = response.user.surname
        absence.email = response.user.email
        absence.createdAt = response.createdAt
        // console.log(response.cours[0]);
        response.cours.forEach(cour => {
            const module = {
                module_id: "",
                module_name: "",
                module_code: "",
                created_at: "",
            }

            module.module_id = cour.module.module_id
            module.module_name = cour.module.module_name
            module.module_code = cour.module.module_code
            module.created_at = cour.module.created_at

            absence.modules.push(module)
        })
        absence.value = []
        absence.value.push(absence);
    }

    async function updateAbsence (absenceData, absenceId) {

        await getAbsence(absenceId);

        const absenceFound = absence.value[0];
        console.log("absence ", absenceFound)
        if (!absenceFound) {
            console.error("absence non trouvé");
            return;
        }

        const responseA = await $fetch(`http://localhost:8000/api/v1/absences/${absenceFound.user_id}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                name: absenceData.name,
                surname: absenceData.surname,
                email: absenceData.email,
            }
        })

        getAllAbsences(1)
        return navigateTo('/admin/absences/absences-liste')
    }

    async function createAbsence (AbsenceData) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/absences`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                name: AbsenceData.name,
                surname: AbsenceData.surname,
                email: AbsenceData.email,
                password: AbsenceData.password,
                password_confirmation: AbsenceData.password_confirmation,
                role: absenceEnum,
                specialite: AbsenceData.specialite,
            }
        })

        getAllAbsences(1)
        return navigateTo('/admin/absences/absences-liste')
    }

    async function deleteAbsence (AbsenceId) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/absences/${AbsenceId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })

        getAllAbsences(1)
    }

    return {
        getAllAbsences,
        getAbsence,
        updateAbsence,
        createAbsence,
        deleteAbsence
    }
}