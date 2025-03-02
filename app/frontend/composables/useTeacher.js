import dayjs from 'dayjs';
import { useUser } from '@/composables/useUser';

export function useTeacher () {
    const { deleteUser } = useUser()
    const cookie = useCookie("auth")
    const data = useState("enseignantsData", () => [])
    const dataArchived = useState("enseignantsDataArchive", () => [])
    const links = useState("enseignantLinks", () => [])
    const linksArchived = useState("enseignantLinksArchive", () => [])
    const teacher = useState("enseignantData", () => [])
    const enseignantEnum = "enseignant"

    async function getAllTeachers (page) {
        data.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/enseignants?page=${page}`, {
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
                createdAt: "",
                deletedAt: ""
            }
            enseignant.enseignant_id = element.enseignant_id
            enseignant.name = element.user?.name + " " + element.user?.surname
            enseignant.email = element.user?.email
            enseignant.hoursAssigned = element.enseignant_id
            enseignant.hoursAbsent = element.enseignant_id
            enseignant.deletedAt = element.deleted_at
            enseignant.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (data.value.length < 10 && enseignant.deletedAt === null) {
                data.value.push(enseignant)
            }
        });

        links.value = []
        if (links.value.length === 0) {
            links.value.push(response.total)
            links.value.push(response.per_page)
        }

    }

    async function getAllTeachersArchived (page) {
        dataArchived.value = []

        const response = await $fetch(`http://localhost:8000/api/v1/enseignants-archived?page=${page}`, {
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
                createdAt: "",
                deletedAt: ""
            }
            enseignant.enseignant_id = element.enseignant_id
            enseignant.name = element.user?.name + " " + element.user?.surname
            enseignant.email = element.user?.email
            enseignant.deletedAt = element.deleted_at
            enseignant.createdAt = dayjs(element.created_at).format("ddd, MMM D YYYY")

            if (dataArchived.value.length < 10 && enseignant.deletedAt !== null) {
                dataArchived.value.push(enseignant)
            }
        });

        linksArchived.value = []
        if (linksArchived.value.length === 0) {
            linksArchived.value.push(response.total)
            linksArchived.value.push(response.per_page)
        }

    }

    async function getTeacher (teacherId) {
        const enseignant = {
            user_id: "",
            enseignant_id: "",
            specialite: "",
            name: "",
            surname: "",
            email: "",
            createdAt: "",
            rapports: [],
            user: [],
            modules: [],
            emargements: [],
            filieres: [],
        }

        const response = await $fetch(`http://localhost:8000/api/v1/enseignants/${teacherId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })
        console.log(enseignant);

        enseignant.user_id = response.user_id
        enseignant.enseignant_id = response.enseignant_id
        enseignant.specialite = response.speciality
        enseignant.name = response.user?.name
        enseignant.surname = response.user?.surname
        enseignant.email = response.user?.email
        enseignant.rapports = response.rapports
        enseignant.user = response.user
        enseignant.emargements = response.emargements
        enseignant.createdAt = dayjs(response.createdAt).format("ddd, MMM D YYYY")
        console.log(response);
        response.emargements.forEach(emargement => {
            enseignant.modules.push(emargement.module.module_name)
            enseignant.modules = [...new Set(enseignant.modules)]
            enseignant.filieres.push(emargement.module.filiere.filiere_name)
            enseignant.filieres = [...new Set(enseignant.filieres)]
        })

        teacher.value = []
        teacher.value.push(enseignant);
    }

    async function updateTeacher (teacherData, teacherId) {

        await getTeacher(teacherId);

        const teacherFound = teacher.value[0];
        if (!teacherFound) {
            console.error("Enseignant non trouvé");
            return;
        }

        const responseA = await $fetch(`http://localhost:8000/api/v1/users/${teacherFound.user_id}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                name: teacherData.name,
                surname: teacherData.surname,
                email: teacherData.email,
            }
        })

        const responseB = await $fetch(`http://localhost:8000/api/v1/enseignants/${teacherId}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                specialite: teacherData.specialite
            }
        })

        getAllTeachers(1)
        return navigateTo('/admin/enseignants/enseignants-liste')
    }

    async function createTeacher (teacherData) {

        const responseA = await $fetch(`http://localhost:8000/api/v1/users`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            },
            body: {
                name: teacherData.name,
                surname: teacherData.surname,
                email: teacherData.email,
                password: teacherData.password,
                password_confirmation: teacherData.password_confirmation,
                role: enseignantEnum,
                specialite: teacherData.specialite,
            }
        })

        getAllTeachers(1)
        return navigateTo('/admin/enseignants/enseignants-liste')
    }

    async function deleteTeacher (teacherId) {
        await getTeacher(teacherId)
        const teacher = useState('enseignantData')
        await deleteUser(teacher.value[0].user_id)
        const responseA = await $fetch(`http://localhost:8000/api/v1/enseignants/${teacherId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })


        getAllTeachers(1)
        return navigateTo('/admin/enseignants/enseignants-liste')
    }

    async function restoreTeacher (teacherId) {
        await getTeacher(teacherId)
        const teacher = useState('enseignantData')
        await deleteUser(teacher.value[0].user_id)
        const responseA = await $fetch(`http://localhost:8000/api/v1/enseignants-restored/${teacherId}`, {
            method: 'PATCH',
            headers: {
                'Authorization': `Bearer ${cookie.value.access_token}`,
                'Accept': 'application/json'
            }
        })


        getAllTeachers(1)
        return navigateTo('/admin/enseignants/enseignants-liste')
    }

    return {
        getAllTeachers,
        getTeacher,
        updateTeacher,
        createTeacher,
        deleteTeacher,
        getAllTeachersArchived,
        restoreTeacher
    }
}