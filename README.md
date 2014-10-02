This project is intended for academic purposes only. Information about the BOINC project can be found at http://boinc.berkeley.edu/.

This experiment involves creating a prototype volunteer computing system by mimicking the BOINC process.

BOINC typically requires volunteers to download a client application to request, receive, and send scientific data that is to be processed.

In this prototype, the browser will be used as the BOINC client so that volunteers can process data while they surf the web. The browser will request and receive data that needs to be processed from a web server. WebCL and WebGL will then be used to send data from the browser to the GPU for computation. The computed results will then be sent back to the server for validation and storage. This process may pave the road for productive casual web browsing while minimally burdening the volunteer. This prototype is not expected to be as efficient nor as powerful as volunteer computing with the BOINC client. However, this prototype could reach a larger audience by being embedded within web pages.

Here is an example of the desired workflow:

1. A web surfer visits a site and is prompted to donate some computing power for Science.

2. If the user accepts, the server's controller will request a work item from the server's model.

3. The model will load a work item from the database and return it to the controller.

4. The controller will send the work item to the browser.

5. The browser will use WebGL and/or WebCL to send the data to the GPU.

6. The GPU will return results to the browser.

7. The browser will send the results to the server.

8. The controller will put the results into a temporary database.

9. The model will retrieve results from the temporary database and perform validation on them.

10. If the results are valid, they are stored within the database.

