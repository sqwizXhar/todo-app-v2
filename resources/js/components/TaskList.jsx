import React, { useState, useEffect } from 'react';
import axios from 'axios';

function TaskList() {
    const [tasks, setTasks] = useState([]);
    const [error, setError] = useState(null);

    useEffect(() => {
        const fetchTasks = async () => {
            try {
                const response = await axios.get('api/tasks');
                setTasks(response.data.tasks);
            } catch (err) {
                setError('Ошибка при загрузке задач');
                console.error('Ошибка:', err);
            }
        };

        fetchTasks();
    }, []);

    if (error) {
        return <div>{error}</div>;
    }

    return (
        <div>
            <h2>Список задач</h2>
            {tasks.length === 0 ? (
                <p>Задач пока нет</p>
            ) : (
                <ol>
                    {Array.isArray(tasks) && tasks.map((task) => (
                        <li key={task.id}>
                            <strong>{task.title}</strong>: {task.description} (Пользователь: {task.user_id})
                        </li>
                    ))}
                </ol>
            )}
        </div>
    );
}

export default TaskList;
