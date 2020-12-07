package main

import ( 
	"fmt"
	"net/http"
)

func main() {
	// Show message when user doesn't request an image
	http.HandleFunc("/", func (w http.ResponseWriter, r *http.Request) {
        fmt.Fprintf(w, "Image not Found")
	})
	http.ListenAndServe(":80", nil) // If this is running on Glitch, be sure to use port 3000
	req.Header.Add("Server", `Riverside Rocks`)
}