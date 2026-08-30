# APP-RECLAMATION

An academic complaints management application that lets students dispute a grade with a professor, with tracking and administrative oversight.

**Stack:** Laravel · MySQL · Tailwind CSS · AlpineJS · Font Awesome

---

## Table of Contents

- [Landing / Login Page](#landing--login-page)
  <img width="1920" height="918" alt="image" src="https://github.com/user-attachments/assets/72d41dd0-22a3-411b-b844-c3335c6e766d" />

- [Admin Page](#admin-page)
  <img width="1920" height="922" alt="image" src="https://github.com/user-attachments/assets/8cf75528-aeab-427f-8746-c3cf5b36aa4f" />

- [Professor Page](#professor-page)
  <img width="1915" height="931" alt="image" src="https://github.com/user-attachments/assets/a8ba4581-3d7a-4b14-9408-93f2131399d0" />

- [Student Page](#student-page)
  <img width="1917" height="925" alt="image" src="https://github.com/user-attachments/assets/3a26b163-c562-449c-9f37-7f5ae22fd2c0" />

- [Demo Accounts](#demo-accounts)
- [Cross-Cutting Features](#cross-cutting-features)

---

## Landing / Login Page

The application's entry point. The user picks their profile:

- **Professeur** (Professor)
- **Etudiant** (Student)

then logs in via the **Log in** button in the top right. The login form automatically redirects to the dashboard matching the account's role (Admin, Professor, or Student).

---

## Admin Page

Dashboard reserved for the administrator, with a sidebar (**Dashboard**, **Formes**, **Paramètre**).

**Overview (Dashboard):**
- Live counters: number of **Students**, **Complaints**, **Professors**
- List of recent complaints with a **Status** filter (Pending / Accepted / Rejected), search, and a reload button
- Pagination

**Student Management (Formes → Etudiant):**
- Paginated list with search by name/first name
- **Excel Import**: bulk-add students via an `.xls`/`.xlsx` file
- **Excel Export**: download the full student list
- Delete the students table

**Professor Management (Formes → Professeur):**
- Same features as Student Management: list, search, Excel import/export

**Add S/M/M (Formes → Ajouter S/M/M):**
- Create Semesters, Modules, and Subjects, linked to the professors who teach them

**Settings (Paramètre):**
- Logout

---

## Professor Page

Dashboard dedicated to complaints received by the logged-in professor.

**Tabs:**
- **Recemment** (Recent): complaints awaiting a response
- **Accepte** (Accepted): complaints processed and accepted
- **Rejecter** (Rejected): complaints processed and rejected

**Columns shown:** ID, student's Name/First name, Email, Status, Date received.

**Responding to a complaint:**
1. Click the detail icon (👁) to open the student's full message
2. Click **Repondre** (Respond) to open the response form
3. Enter the new grades (Continuous Assessment, Exam, Final) and a remark
4. Attach a photo/supporting document (required)
5. Choose **Accept** or **Reject** — a complaint can only be responded to once

**Security:** a professor can only view and respond to complaints addressed to them; any attempt to access another professor's complaint is blocked (403).

**Settings:** change password, logout.

---

## Student Page

Interface for a student to submit a grade dispute.

**Sending a complaint:**
1. Select: **Semester**, **Module**, **Subject**, **Professor**, **Academic Year**
2. Write the reason for the complaint in the **About me** field
3. Click **Envoyer** (Send)

**Tracking complaints:**
- **Recemment** (Recent): sent complaints, awaiting a response
- **Accepte** (Accepted): complaints validated by the professor (new grade applied)
- **Rejecter** (Rejected): rejected complaints, with the professor's remark viewable via the 👁 icon

A confirmation message appears after sending ("Saved successfully!").

---

## Demo Accounts

| Role | Display Name | Email |
|---|---|---|
| Professor | Nom2 Hamid | *(test account)* |
| Student | Nom1 Youssef | youssef@exemple.com |
| Student | Nom2 Achraf | achraf@exemple.com |
| Student | Hamid Nom2 | hamid@exemple.com |

> Replace with real credentials before going to production. These `@exemple.com` addresses are test data.

---

## Cross-Cutting Features

- **Excel Import/Export** for bulk management of students and professors (initial roster upload, list updates)
- **PDF Generation** of complaints (download button in the admin/professor lists)
- **Status filtering** (Pending / Accepted / Rejected) and **search** on all main lists
- **Roles and permissions**: `check.role` middleware on every route, ensuring a user can only access pages and data matching their role (admin / professor / student)
- **Responsive**: the desktop sidebar collapses into a burger menu on mobile, and lists/tables adapt to small screens
