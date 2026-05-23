# Local HTTPS certificates for development

This project supports HTTPS locally via `nginx` and the `docker-compose.yml` setup.

## Recommended setup (mkcert)

1. Install `mkcert` for your OS.
2. Run:

```bash
mkcert -install
mkcert -key-file certs/localhost.key -cert-file certs/localhost.crt localhost 127.0.0.1 ::1
```

3. Start the project:

```bash
docker compose up --build
```

4. Open in browser:

```text
https://localhost:8443
```

## Fallback using OpenSSL

If you don't want to use `mkcert`, create a self-signed certificate:

```bash
openssl req -x509 -nodes -days 365 \
  -newkey rsa:2048 \
  -keyout certs/localhost.key \
  -out certs/localhost.crt \
  -subj "/CN=localhost" \
  -addext "subjectAltName=DNS:localhost,IP:127.0.0.1,IP:::1"
```

Then start the stack and visit:

```text
https://localhost:8443
```

> Browsers may still warn for self-signed certificates unless you trust the local certificate authority.
