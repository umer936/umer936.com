## Car Diagnostics Monitor and Logger

Car Diagnostics Monitor

<!-- todo: add image here -->

### Project Overview

In December 2015, I embarked on a personal project aimed at understanding my car's usage more comprehensively. With an unused Raspberry Pi computer lying around, I decided to explore the world of vehicle diagnostics by creating a Car Diagnostics Monitor and Logger. This project not only enhanced my technical skills but also provided valuable insights into the computer systems that power modern vehicles.

### The Challenge

As a car owner, I often wondered about the various metrics related to my vehicle's performance. I wanted a solution that would allow me to monitor important data such as RPM, intake temperature, tire pressures, and engine codes. With the advent of advanced diagnostic tools in the market, I aimed to develop a more privacy-oriented method of collecting and analyzing this data.

### Project Implementation

To kick off the project, I ordered a Bluetooth OBD-II (On-board diagnostics) device, which is essential for accessing the car's diagnostic data. I delved into the intricacies of the CAN bus and the engine codes available through the OBD-II interface. 

I found a Python script that enabled the connection between the OBD-II device and the Raspberry Pi. Adapting this script, I set it up to log data every quarter of a second. Once I arrived home, the Raspberry Pi would connect to WiFi and push the logged data to my GitHub repository, where I could graph various metrics.

#### Key Features

- **Real-Time Data Logging**: The system logs critical data every 0.25 seconds, providing a detailed view of the car's performance metrics.

- **Data Visualization**: By pushing the data to GitHub, I can create graphs to visualize trends in RPM, intake temperature, tire pressures, and engine codes.

- **Privacy-Oriented Solution**: Unlike many high-tech cars that offer built-in diagnostics through manufacturer tools, my solution prioritizes user privacy by allowing independent data collection.

### Technical Details

- **Size**: The entire setup is credit card-sized, making it compact and easy to store.

- **Date Created**: December 2015

- **Medium Used**: This project involved both software and hardware components, utilizing the Raspberry Pi and OBD-II device.

### Conclusion

The Car Diagnostics Monitor and Logger project was a valuable learning experience that deepened my understanding of automotive systems and diagnostics. It serves as a plug-and-play solution for under $50, making it accessible for anyone interested in monitoring their vehicle's performance. While modern vehicles now come equipped with sophisticated diagnostic tools, my project remains a testament to the power of DIY solutions and the importance of privacy in data collection.