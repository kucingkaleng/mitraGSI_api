# Items

---
Halaman dokumentasi untuk pengolahan item

- [Get All Items](#section-1)

<a name="section-1"></a>
## Get All Items

### Endpoint
| Method | Endpoint    |
| :      |   :-        |
| GET    | `/item/get` |

### Params
| Param     | Value        | Description |
| :         |   :-         | :- |
| userid    | ID dari user | Mendapatkan semua item dari user tertentu beserta stoknya |
| itemid    | ID dari item | Mendapatkan item dengan ID tertentu |
| stock     | true,1,dll   | Mendapatkan semua item dari semua user beserta stoknya <strong>(tidak berefek jika digabung dengan userid)</strong> |
