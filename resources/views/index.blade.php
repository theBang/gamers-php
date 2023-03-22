<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="witdth=device-width">
    <title>Список игроков</title>
    <style>
        html {
            font-size: 16px;
            font-family: sans-serif;
            background-color: #252525;
            color: #ffffff;
        }

        body {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 20px 20px 20px;
        }

        h1 {
            font-size: 48px;
            text-align: center;
        }

        p,
        li {
            font-size: 16px;
        }

        table {
            border: 1px solid #ffffff;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #fff;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>Список игроков</h1>
    <table></table>

    <script>
        const header = {
            nickname: "Ник",
            email: "Email",
            registered: "Зарегистрирован",
            status: "Статус"
        }

        function formatStatus(status) {
            return status ? "On" : "Off";
        }

        function formatDate(utc) {
            const dateTime = new Date(utc * 1000); // From seconds to ms precision
            const locale = "ru-RU";
            const options = {
                timeZone: "UTC"
            };
            const date = dateTime.toLocaleDateString(locale, options);
            const time = dateTime.toLocaleTimeString(locale, {
                ...options,
                timeStyle: "short"
            });

            return date + " " + time;
        }

        function renderTable(players) {
            if (Array.isArray(players) && !!players[0]) {
                const table = document.querySelector("table");
                table.innerHTML = "";

                const headerRow = document.createElement("tr");
                for (const key of Object.keys(players[0])) {
                    const cell = document.createElement("th");
                    cell.innerText = header[key];
                    headerRow.appendChild(cell);
                }
                const tableHeader = document.createElement("thead");
                tableHeader.appendChild(headerRow);
                table.appendChild(tableHeader);

                const tableBody = document.createElement("tbody");
                for (const player of players) {
                    const row = document.createElement("tr");
                    for (const [key, value] of Object.entries(player)) {
                        const cell = document.createElement("td");
                        let text = value;

                        if (key === "status") {
                            text = formatStatus(value);
                        } else if (key === "registered") {
                            text = formatDate(value);
                        }

                        cell.innerText = text;
                        row.appendChild(cell);
                    }
                    tableBody.appendChild(row);
                }
                table.appendChild(tableBody);
            }
        }

        fetch("/api/players").then(r => r.json()).then(renderTable);
    </script>
</body>

</html>