
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Submitted</title>
</head>
<body style="margin:0;background:#f5f8f6;font-family:Arial,sans-serif;color:#25352d;padding:25px 10px;">

    <div style="max-width:600px;margin:auto;background:#ffffff;border:1px solid #dce7e0;border-radius:12px;overflow:hidden;">

        <div style="background:#21604A;color:#ffffff;text-align:center;padding:24px;">
            <h1 style="margin:0;">JobBridge</h1>
            <p style="margin:8px 0 0;">Your career journey starts here</p>
        </div>

        <div style="padding:28px;">
            <h2 style="color:#144432;">Application Submitted Successfully!</h2>

            <p>Hello {{ $application->full_name }},</p>

            <p>
                Thank you for applying through JobBridge.
                Your application has been submitted successfully.
            </p>

            <div style="background:#edf5f0;padding:18px;border-radius:8px;margin:20px 0;">
                <p style="margin:0 0 10px;">
                    <strong>Job Title:</strong>
                    {{ $application->job_title }}
                </p>

                <p style="margin:0 0 10px;">
                    <strong>Company:</strong>
                    {{ $application->company_name ?? 'Company not specified' }}
                </p>

                <p style="margin:0;">
                    <strong>Application Status:</strong> Pending
                </p>
            </div>

            <p>
                The recruiter will review your application.
                You can check for updates through your JobBridge account.
            </p>

            <p>Best wishes,<br><strong>JobBridge Team</strong></p>
        </div>

        <div style="background:#f5f8f6;text-align:center;padding:15px;color:#68776f;font-size:12px;">
            This is an automated confirmation email. Please do not reply directly.
        </div>

    </div>
</body>
</html>
