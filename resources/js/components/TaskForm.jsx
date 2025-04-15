import React from 'react';
import axios from 'axios';

function TaskForm() {
    const handleSubmit = async (e) => {
        e.preventDefault();

        const data = {
            title: 'one day smoke',
            description: 'one day no smoke',
            user_id: 1,
        };

        const metaTag = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = metaTag ? metaTag.getAttribute('content') : null;

        if (!csrfToken) {
            console.error('CSRF token not found');
            return;
        }

        try {
            const response = await axios.post('api/task', data, {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            });

            alert('Данные успешно отправлены!');
            console.log(response.data);
        } catch (error) {
            console.error('Ошибка при отправке данных:', error);
        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <button type="submit">Отправить задачу</button>
        </form>
    );
}

export default TaskForm;
